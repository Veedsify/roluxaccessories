<?php

namespace Database\Seeders;

use App\Models\ShippingRate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingRateSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        $shippingRates = [
            // Major cities with lower rates
            [
                "state" => "Lagos",
                "rate" => 1500.0,
                "is_active" => true,
                "description" => "Major commercial hub",
            ],
            [
                "state" => "FCT",
                "rate" => 2000.0,
                "is_active" => true,
                "description" => "Federal Capital Territory",
            ],
            [
                "state" => "Kano",
                "rate" => 2500.0,
                "is_active" => true,
                "description" => "Northern commercial center",
            ],
            [
                "state" => "Rivers",
                "rate" => 2200.0,
                "is_active" => true,
                "description" => "Oil rich state",
            ],
            [
                "state" => "Ogun",
                "rate" => 1800.0,
                "is_active" => true,
                "description" => "Close to Lagos",
            ],

            // South-West states
            [
                "state" => "Oyo",
                "rate" => 2000.0,
                "is_active" => true,
                "description" => "South-West region",
            ],
            [
                "state" => "Osun",
                "rate" => 2100.0,
                "is_active" => true,
                "description" => "South-West region",
            ],
            [
                "state" => "Ondo",
                "rate" => 2300.0,
                "is_active" => true,
                "description" => "South-West region",
            ],
            [
                "state" => "Ekiti",
                "rate" => 2400.0,
                "is_active" => true,
                "description" => "South-West region",
            ],

            // South-East states
            [
                "state" => "Anambra",
                "rate" => 2600.0,
                "is_active" => true,
                "description" => "South-East commercial hub",
            ],
            [
                "state" => "Imo",
                "rate" => 2700.0,
                "is_active" => true,
                "description" => "South-East region",
            ],
            [
                "state" => "Enugu",
                "rate" => 2800.0,
                "is_active" => true,
                "description" => "South-East region",
            ],
            [
                "state" => "Abia",
                "rate" => 2750.0,
                "is_active" => true,
                "description" => "South-East region",
            ],
            [
                "state" => "Ebonyi",
                "rate" => 2900.0,
                "is_active" => true,
                "description" => "South-East region",
            ],

            // South-South states
            [
                "state" => "Delta",
                "rate" => 2400.0,
                "is_active" => true,
                "description" => "South-South oil state",
            ],
            [
                "state" => "Cross River",
                "rate" => 3000.0,
                "is_active" => true,
                "description" => "South-South border state",
            ],
            [
                "state" => "Akwa Ibom",
                "rate" => 2800.0,
                "is_active" => true,
                "description" => "South-South oil state",
            ],
            [
                "state" => "Bayelsa",
                "rate" => 3200.0,
                "is_active" => true,
                "description" => "South-South oil state",
            ],
            [
                "state" => "Edo",
                "rate" => 2300.0,
                "is_active" => true,
                "description" => "South-South region",
            ],

            // North-Central states
            [
                "state" => "Kwara",
                "rate" => 2500.0,
                "is_active" => true,
                "description" => "North-Central region",
            ],
            [
                "state" => "Niger",
                "rate" => 2600.0,
                "is_active" => true,
                "description" => "North-Central large state",
            ],
            [
                "state" => "Plateau",
                "rate" => 2700.0,
                "is_active" => true,
                "description" => "North-Central region",
            ],
            [
                "state" => "Benue",
                "rate" => 2800.0,
                "is_active" => true,
                "description" => "North-Central food basket",
            ],
            [
                "state" => "Kogi",
                "rate" => 2600.0,
                "is_active" => true,
                "description" => "North-Central confluence state",
            ],
            [
                "state" => "Nasarawa",
                "rate" => 2500.0,
                "is_active" => true,
                "description" => "North-Central region",
            ],

            // North-West states
            [
                "state" => "Kaduna",
                "rate" => 2800.0,
                "is_active" => true,
                "description" => "North-West major city",
            ],
            [
                "state" => "Katsina",
                "rate" => 3000.0,
                "is_active" => true,
                "description" => "North-West border state",
            ],
            [
                "state" => "Sokoto",
                "rate" => 3200.0,
                "is_active" => true,
                "description" => "North-West far state",
            ],
            [
                "state" => "Zamfara",
                "rate" => 3100.0,
                "is_active" => true,
                "description" => "North-West region",
            ],
            [
                "state" => "Kebbi",
                "rate" => 3300.0,
                "is_active" => true,
                "description" => "North-West far state",
            ],
            [
                "state" => "Jigawa",
                "rate" => 2900.0,
                "is_active" => true,
                "description" => "North-West region",
            ],

            // North-East states
            [
                "state" => "Bauchi",
                "rate" => 3000.0,
                "is_active" => true,
                "description" => "North-East region",
            ],
            [
                "state" => "Gombe",
                "rate" => 3100.0,
                "is_active" => true,
                "description" => "North-East region",
            ],
            [
                "state" => "Adamawa",
                "rate" => 3400.0,
                "is_active" => true,
                "description" => "North-East border state",
            ],
            [
                "state" => "Taraba",
                "rate" => 3500.0,
                "is_active" => true,
                "description" => "North-East far state",
            ],
            [
                "state" => "Yobe",
                "rate" => 3600.0,
                "is_active" => true,
                "description" => "North-East border state",
            ],
            [
                "state" => "Borno",
                "rate" => 3800.0,
                "is_active" => true,
                "description" => "North-East far state",
            ],
        ];

        foreach ($shippingRates as $rate) {
            ShippingRate::updateOrCreate(["state" => $rate["state"]], $rate);
        }
    }
}
