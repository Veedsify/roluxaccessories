<?php

namespace App\View\Composers;

use App\Services\ConfigurationService;
use Illuminate\View\View;

class ConfigurationComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $view->with([
            'siteName' => ConfigurationService::getSiteName(),
            'siteLogo' => ConfigurationService::getSiteLogo(),
            'contactInfo' => ConfigurationService::getContactInfo(),
            'socialMedia' => ConfigurationService::getSocialMedia(),
            'seoSettings' => ConfigurationService::getSeoSettings(),
        ]);
    }
}
