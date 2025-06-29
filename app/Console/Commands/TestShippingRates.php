<?php

namespace App\Console\Commands;

use App\Models\ShippingRate;
use Illuminate\Console\Command;

class TestShippingRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "test:shipping-rates";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Test shipping rates functionality";

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Testing Shipping Rates Functionality...");
        $this->newLine();

        // Test 1: Get all Nigerian states
        $this->info("1. Testing Nigerian States List:");
        $states = ShippingRate::getNigerianStates();
        $this->line("   Total states: " . count($states));
        $this->line(
            "   Sample states: " .
                implode(", ", array_slice($states, 0, 5)) .
                "..."
        );
        $this->newLine();

        // Test 2: Check active shipping rates
        $this->info("2. Testing Active Shipping Rates:");
        $activeRates = ShippingRate::active()->count();
        $this->line("   Active rates count: " . $activeRates);
        $this->newLine();

        // Test 3: Test specific state rate lookup
        $this->info("3. Testing Rate Lookup for Lagos:");
        $lagosRate = ShippingRate::getRateForState("Lagos");
        if ($lagosRate) {
            $this->line(
                "   Lagos shipping rate: ₦" . number_format($lagosRate, 2)
            );
        } else {
            $this->error("   Lagos rate not found!");
        }
        $this->newLine();

        // Test 4: Test availability check
        $this->info("4. Testing Shipping Availability:");
        $testStates = ["Lagos", "FCT", "Rivers", "NonExistentState"];
        foreach ($testStates as $state) {
            $available = ShippingRate::isShippingAvailable($state);
            $status = $available ? "✓ Available" : "✗ Not Available";
            $this->line("   {$state}: {$status}");
        }
        $this->newLine();

        // Test 5: Show some sample rates
        $this->info("5. Sample Shipping Rates:");
        $sampleRates = ShippingRate::active()->take(5)->get();
        foreach ($sampleRates as $rate) {
            $this->line("   {$rate->state}: ₦" . number_format($rate->rate, 2));
        }
        $this->newLine();

        $this->info("✓ All tests completed successfully!");
        return Command::SUCCESS;
    }
}
