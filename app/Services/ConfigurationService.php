<?php

namespace App\Services;

use App\Models\Configuration;
use Illuminate\Support\Facades\Cache;

class ConfigurationService
{
    /**
     * Get configuration value with caching
     */
    public static function get(string $key, $default = null)
    {
        return Cache::remember("config_{$key}", 3600, function () use ($key, $default) {
            return Configuration::get($key, $default);
        });
    }

    /**
     * Set configuration value and clear cache
     */
    public static function set(string $key, $value, string $type = 'text', string $group = 'general', ?string $label = null): void
    {
        Configuration::set($key, $value, $type, $group, $label);
        Cache::forget("config_{$key}");
        Cache::forget('configurations_all');
    }

    /**
     * Get all configurations grouped by category with caching
     */
    public static function getAll(): array
    {
        return Cache::remember('configurations_all', 3600, function () {
            return Configuration::active()
                ->orderBy('group')
                ->orderBy('sort_order')
                ->get()
                ->groupBy('group')
                ->toArray();
        });
    }

    /**
     * Get configurations by group with caching
     */
    public static function getByGroup(string $group): array
    {
        return Cache::remember("config_group_{$group}", 3600, function () use ($group) {
            return Configuration::byGroup($group)
                ->active()
                ->orderBy('sort_order')
                ->pluck('value', 'key')
                ->toArray();
        });
    }

    /**
     * Clear all configuration cache
     */
    public static function clearCache(): void
    {
        $keys = Configuration::pluck('key');
        foreach ($keys as $key) {
            Cache::forget("config_{$key}");
        }
        Cache::forget('configurations_all');

        $groups = Configuration::distinct('group')->pluck('group');
        foreach ($groups as $group) {
            Cache::forget("config_group_{$group}");
        }
    }

    /**
     * Get site name
     */
    public static function getSiteName(): string
    {
        return self::get('site_name', 'Roluxe Accessories');
    }

    /**
     * Get site logo URL
     */
    public static function getSiteLogo(): ?string
    {
        $logo = self::get('site_logo');
        return $logo ? asset('storage/' . $logo) : null;
    }

    /**
     * Get contact information
     */
    public static function getContactInfo(): array
    {
        $contactInfo = self::getByGroup('contact');
        return is_array($contactInfo) ? $contactInfo : [];
    }

    /**
     * Get social media URLs
     */
    public static function getSocialMedia(): array
    {
        $socialMedia = self::getByGroup('social');
        return is_array($socialMedia) ? array_filter($socialMedia) : [];
    }

    /**
     * Get SEO settings
     */
    public static function getSeoSettings(): array
    {
        $seoSettings = self::getByGroup('seo');
        return is_array($seoSettings) ? $seoSettings : [];
    }

    /**
     * Get business hours
     */
    public static function getBusinessHours(): array
    {
        $hours = self::get('business_hours');
        return is_array($hours) ? $hours : [];
    }
}
