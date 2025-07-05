<?php

use App\Services\ConfigurationService;

if (!function_exists('config_get')) {
    /**
     * Get configuration value
     */
    function config_get(string $key, $default = null)
    {
        return ConfigurationService::get($key, $default);
    }
}

if (!function_exists('site_name')) {
    /**
     * Get site name
     */
    function site_name(): string
    {
        return ConfigurationService::getSiteName();
    }
}

if (!function_exists('site_logo')) {
    /**
     * Get site logo URL
     */
    function site_logo(): ?string
    {
        return ConfigurationService::getSiteLogo();
    }
}

if (!function_exists('contact_info')) {
    /**
     * Get contact information
     */
    function contact_info(): array
    {
        return ConfigurationService::getContactInfo();
    }
}

if (!function_exists('social_media')) {
    /**
     * Get social media URLs
     */
    function social_media(): array
    {
        return ConfigurationService::getSocialMedia();
    }
}
