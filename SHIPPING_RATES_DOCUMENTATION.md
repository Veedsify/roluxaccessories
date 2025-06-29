# Shipping Rates Management System

## Overview

This document provides comprehensive information about the Shipping Rates Management System implemented for RoluxeAccessories. The system allows for managing shipping rates based on Nigerian states through both a Filament admin interface and API endpoints.

## Features

- ✅ Complete Nigerian states coverage (37 states + FCT)
- ✅ Filament admin interface for easy management
- ✅ RESTful API endpoints for frontend integration
- ✅ Bulk operations (activate/deactivate multiple rates)
- ✅ Auto-initialization of all Nigerian states
- ✅ Integration with existing Order system
- ✅ Rate calculation helpers
- ✅ Shipping availability checks

## Database Structure

### `shipping_rates` Table

| Column | Type | Description |
|--------|------|-------------|
| `id` | bigint | Primary key |
| `state` | string(255) | Nigerian state name (unique) |
| `rate` | decimal(10,2) | Shipping rate in Naira |
| `is_active` | boolean | Whether the rate is active |
| `description` | text | Optional description |
| `created_at` | timestamp | Record creation time |
| `updated_at` | timestamp | Record last update time |

### `orders` Table Enhancement

Added `shipping_cost` column:
- **Type**: `decimal(10,2)`
- **Nullable**: Yes
- **Position**: After `total_amount`

## Model Structure

### ShippingRate Model

Located at: `app/Models/ShippingRate.php`

#### Key Methods

```php
// Get all Nigerian states
ShippingRate::getNigerianStates(): array

// Get shipping rate for a specific state
ShippingRate::getRateForState(string $state): ?float

// Calculate shipping cost for an order
ShippingRate::calculateShippingCost($address): float

// Get all active shipping rates
ShippingRate::getActiveRates(): array

// Check if shipping is available for a state
ShippingRate::isShippingAvailable(string $state): bool

// Scope for active rates only
ShippingRate::active()
```

### Order Model Enhancement

Enhanced with shipping calculation methods:

```php
// Calculate shipping cost for this order
$order->calculateShippingCost(): float

// Get total amount including shipping
$order->getTotalAmountWithShipping(): float

// Update shipping cost based on current address
$order->updateShippingCost(): void
```

## Filament Admin Interface

### Resource Location
`app/Filament/Resources/ShippingRateResource.php`

### Features
- **Navigation Group**: "Shipping"
- **Navigation Icon**: Truck icon
- **Form Fields**:
  - State selection (searchable dropdown)
  - Rate input with Naira prefix
  - Active/Inactive toggle
  - Optional description textarea

### Table Features
- State display as badges
- Formatted currency display
- Active/Inactive status icons
- Description with tooltips
- Created/Updated timestamps (toggleable)
- Sorting and filtering capabilities

### Bulk Actions
1. **Delete Selected**: Remove multiple records
2. **Activate Selected**: Enable multiple shipping rates
3. **Deactivate Selected**: Disable multiple shipping rates

### Special Actions
- **Initialize All Nigerian States**: Creates entries for all states not yet in the database

### Navigation
- **List**: `/admin/shipping-rates`
- **Create**: `/admin/shipping-rates/create`
- **Edit**: `/admin/shipping-rates/{record}/edit`

## API Endpoints

Base URL: `/api/shipping`

### 1. Get All Active Rates
```
GET /api/shipping/rates
```

**Response:**
```json
{
    "success": true,
    "data": [
        {
            "state": "Lagos",
            "rate": "1500.00",
            "description": "Major commercial hub"
        }
    ]
}
```

### 2. Get Rate by State
```
GET /api/shipping/rates/{state}
```

**Response (Success):**
```json
{
    "success": true,
    "data": {
        "state": "Lagos",
        "rate": "1500.00",
        "description": "Major commercial hub"
    }
}
```

**Response (Not Found):**
```json
{
    "success": false,
    "message": "Shipping not available for this state"
}
```

### 3. Calculate Shipping Cost
```
POST /api/shipping/calculate
Content-Type: application/json

{
    "state": "Lagos"
}
```

**Response:**
```json
{
    "success": true,
    "data": {
        "state": "Lagos",
        "shipping_cost": 1500.00,
        "formatted_cost": "₦1,500.00"
    }
}
```

### 4. Get States with Availability
```
GET /api/shipping/states
```

**Response:**
```json
{
    "success": true,
    "data": [
        {
            "state": "Lagos",
            "available": true,
            "rate": 1500.00
        },
        {
            "state": "SomeState",
            "available": false,
            "rate": null
        }
    ]
}
```

## Usage Examples

### Frontend Integration

#### Get Available Shipping Options
```javascript
fetch('/api/shipping/rates')
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const rates = data.data;
            // Populate shipping options
        }
    });
```

#### Calculate Shipping for Checkout
```javascript
const calculateShipping = async (state) => {
    const response = await fetch('/api/shipping/calculate', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ state })
    });
    
    const data = await response.json();
    if (data.success) {
        return data.data.shipping_cost;
    }
    return 0;
};
```

### Backend Integration

#### Order Processing
```php
// Calculate shipping when creating an order
$order = new Order();
$order->user_id = $userId;
$order->address_id = $addressId;
$order->total_amount = $subtotal;

// Calculate and set shipping cost
$order->shipping_cost = $order->calculateShippingCost();

// Save order with shipping included
$order->save();
```

#### Address Validation
```php
// Check if shipping is available to an address
$address = Address::find($addressId);
$isAvailable = ShippingRate::isShippingAvailable($address->state);

if (!$isAvailable) {
    return response()->json([
        'error' => 'Shipping not available to this location'
    ], 400);
}
```

## Default Shipping Rates

The system includes pre-configured rates for all Nigerian states:

### Major Cities (Lower Rates)
- **Lagos**: ₦1,500.00
- **FCT (Abuja)**: ₦2,000.00
- **Kano**: ₦2,500.00
- **Rivers**: ₦2,200.00

### Regional Rates
- **South-West**: ₦1,800 - ₦2,400
- **South-East**: ₦2,600 - ₦2,900
- **South-South**: ₦2,300 - ₦3,200
- **North-Central**: ₦2,500 - ₦2,800
- **North-West**: ₦2,800 - ₦3,300
- **North-East**: ₦3,000 - ₦3,800

## Commands

### Test Shipping Rates
```bash
php artisan test:shipping-rates
```
Runs comprehensive tests on the shipping rates functionality.

### Seed Initial Data
```bash
php artisan db:seed --class=ShippingRateSeeder
```
Populates the database with default shipping rates for all Nigerian states.

## File Structure

```
app/
├── Console/Commands/
│   └── TestShippingRates.php
├── Filament/Resources/
│   ├── ShippingRateResource.php
│   └── ShippingRateResource/Pages/
│       ├── CreateShippingRate.php
│       ├── EditShippingRate.php
│       └── ListShippingRates.php
├── Http/Controllers/Api/
│   └── ShippingRateController.php
└── Models/
    ├── ShippingRate.php
    └── Order.php (enhanced)

database/
├── migrations/
│   ├── 2025_06_27_232610_create_shipping_rates_table.php
│   └── 2025_06_27_233704_add_shipping_cost_to_orders_table.php
└── seeders/
    └── ShippingRateSeeder.php

routes/
└── api.php (created/enhanced)
```

## Security Considerations

1. **API Rate Limiting**: Consider implementing rate limiting for API endpoints
2. **Input Validation**: All API inputs are validated
3. **State Validation**: Only valid Nigerian states are accepted
4. **Database Constraints**: Unique constraint on state names

## Maintenance

### Adding New States
If new states are added to Nigeria, update the `getNigerianStates()` method in the ShippingRate model.

### Bulk Rate Updates
Use the Filament interface bulk actions or create custom commands for bulk rate updates.

### Monitoring
- Monitor API endpoint usage
- Track shipping cost accuracy
- Review inactive rates periodically

## Troubleshooting

### Common Issues

1. **Shipping rate not found**
   - Check if the state exists in the database
   - Verify the state is marked as active
   - Ensure exact string matching (case-sensitive)

2. **API endpoints not working**
   - Verify API routes are registered in `bootstrap/app.php`
   - Check if the API middleware is properly configured

3. **Filament resource not showing**
   - Clear application cache: `php artisan cache:clear`
   - Ensure proper navigation group configuration

### Debug Commands
```bash
# Check routes
php artisan route:list --path=api
php artisan route:list --path=admin

# Test functionality
php artisan test:shipping-rates

# Check database
php artisan tinker
>>> ShippingRate::count()
>>> ShippingRate::active()->count()
```

## Future Enhancements

Potential improvements for the shipping rates system:

1. **Weight-based Calculations**: Add weight tiers for different rates
2. **Zone-based Shipping**: Group states into shipping zones
3. **Delivery Time Estimates**: Add estimated delivery times per state
4. **Special Rates**: Holiday or promotional shipping rates
5. **Carrier Integration**: Multiple shipping carrier options
6. **Distance Calculation**: GPS-based distance calculations
7. **Bulk Import/Export**: CSV import/export functionality

## Support

For issues or questions regarding the shipping rates system, please refer to:
- This documentation
- Code comments in the relevant files
- Laravel and Filament official documentation