# Search Functionality Documentation

## Overview

The search functionality provides a comprehensive way to search and filter products in the RoluxeAccessories application. It includes both a dedicated search page and API endpoints for programmatic access.

## Features

### 1. Search Page (`/search`)

- **Full-text search**: Search by product name and description
- **Advanced filtering**: Filter by category, brand, product type, and price range
- **Sorting options**: Sort by name, price, creation date, or rating
- **Display modes**: Grid and list view options
- **Real-time search**: Live search with debouncing for better performance
- **Pagination**: Results are paginated for better performance

### 2. Search API Endpoints

#### Search Products

```
GET /api/search/products
```

**Parameters:**

- `q` (string): Search query
- `category_id` (integer): Filter by category ID
- `brand_id` (integer): Filter by brand ID
- `product_type_id` (integer): Filter by product type ID
- `min_price` (number): Minimum price filter
- `max_price` (number): Maximum price filter
- `sort_by` (string): Sort column (name, price, created_at, rate)
- `sort_order` (string): Sort direction (asc, desc)
- `per_page` (integer): Results per page (default: 12)

**Example:**

```
GET /api/search/products?q=shirt&category_id=1&sort_by=price&sort_order=asc
```

#### Search Suggestions

```
GET /api/search/suggestions
```

**Parameters:**

- `q` (string): Search query (minimum 2 characters)

**Example:**

```
GET /api/search/suggestions?q=sh
```

#### Get Filter Options

```
GET /api/search/filters
```

Returns available categories, brands, product types, and price range for filtering.

### 3. Search Form Component

The search form component (`@livewire('components.search-form')`) can be embedded anywhere in the application and provides:

- Auto-complete suggestions
- Keyboard navigation
- Seamless integration with the search page

## Usage

### Basic Search

1. Navigate to `/search` or use the search form in the navigation
2. Enter your search query
3. Press Enter or click the search button

### Advanced Filtering

1. Go to the search page
2. Use the sidebar filters to narrow down results:
   - Select categories
   - Choose brands
   - Pick product types
   - Set price range
3. Results update automatically

### Keyboard Shortcuts

- `Ctrl+K` (or `Cmd+K` on Mac): Focus search input
- `Enter`: Submit search
- `Escape`: Clear search suggestions

## Implementation Details

### Frontend Components

- **SearchPage**: Simplified page wrapper component (acts as a route handler)
- **SearchPageContent**: Main search functionality component (contains all search logic)
- **SearchForm**: Reusable search form component with suggestions
- **Navigation**: Updated to include search functionality

### Architecture Benefits

The search functionality uses a **two-component architecture** to optimize Livewire performance:

1. **SearchPage** (`App\Livewire\Page\SearchPage`):

   - Acts as a simple page wrapper
   - Handles routing and page structure
   - No state management or heavy logic
   - Better performance for full-page components

2. **SearchPageContent** (`App\Livewire\Components\SearchPageContent`):
   - Contains all search logic and state management
   - Handles filtering, sorting, and pagination
   - Manages product queries and cart interactions
   - Isolated component for better state handling

This separation prevents common Livewire issues with full-page components while maintaining clean code organization.

### Backend Components

- **SearchController**: Handles API endpoints
- **Product Model**: Enhanced with search relationships
- **Routes**: Web and API routes for search functionality

### Database Queries

The search functionality uses optimized database queries with:

- LIKE operations for text search
- Eager loading for related models
- Proper indexing considerations
- Pagination for performance

## Customization

### Adding New Filters

1. Add the filter property to `SearchPageContent` component
2. Update the `getProductsProperty()` method to include the new filter
3. Add the filter to the search page content view
4. Update the API endpoint if needed

### Modifying Search Algorithm

Update the search logic in both:

- `SearchController@searchProducts` method
- `SearchPage@getProductsProperty` method

### Styling

The search components use Tailwind CSS classes and can be customized by modifying the view files:

- `search-page.blade.php`
- `search-form.blade.php`

## Performance Considerations

- Search queries are debounced to reduce server load
- Results are paginated
- Related models are eager loaded
- Consider adding database indexes for frequently searched columns

## Future Enhancements

- Search result highlighting
- Search analytics
- Faceted search
- Elasticsearch integration for better search performance
- Search history
- Saved searches
