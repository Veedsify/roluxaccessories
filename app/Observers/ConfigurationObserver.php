<?php

namespace App\Observers;

use App\Models\Configuration;
use App\Services\ConfigurationService;

class ConfigurationObserver
{
    /**
     * Handle the Configuration "created" event.
     */
    public function created(Configuration $configuration): void
    {
        ConfigurationService::clearCache();
    }

    /**
     * Handle the Configuration "updated" event.
     */
    public function updated(Configuration $configuration): void
    {
        ConfigurationService::clearCache();
    }

    /**
     * Handle the Configuration "deleted" event.
     */
    public function deleted(Configuration $configuration): void
    {
        ConfigurationService::clearCache();
    }

    /**
     * Handle the Configuration "restored" event.
     */
    public function restored(Configuration $configuration): void
    {
        ConfigurationService::clearCache();
    }

    /**
     * Handle the Configuration "force deleted" event.
     */
    public function forceDeleted(Configuration $configuration): void
    {
        ConfigurationService::clearCache();
    }
}
