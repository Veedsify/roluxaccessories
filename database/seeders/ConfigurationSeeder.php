<?php

namespace Database\Seeders;

use App\Models\Configuration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $configurations = [
            // General Settings
            [
                'key' => 'site_name',
                'value' => 'Roluxe Accessories',
                'type' => 'text',
                'group' => 'general',
                'label' => 'Site Name',
                'description' => 'The name of your website',
                'sort_order' => 1,
            ],
            [
                'key' => 'site_tagline',
                'value' => 'Premium Fashion Accessories',
                'type' => 'text',
                'group' => 'general',
                'label' => 'Site Tagline',
                'description' => 'A short description of your business',
                'sort_order' => 2,
            ],
            [
                'key' => 'site_logo',
                'value' => null,
                'type' => 'image',
                'group' => 'appearance',
                'label' => 'Site Logo',
                'description' => 'Main logo for your website',
                'sort_order' => 1,
            ],
            [
                'key' => 'favicon',
                'value' => null,
                'type' => 'image',
                'group' => 'appearance',
                'label' => 'Favicon',
                'description' => 'Small icon that appears in browser tabs',
                'sort_order' => 2,
            ],

            // Contact Information
            [
                'key' => 'contact_email',
                'value' => 'contact@roluxeaccessories.com',
                'type' => 'email',
                'group' => 'contact',
                'label' => 'Contact Email',
                'description' => 'Main contact email address',
                'sort_order' => 1,
            ],
            [
                'key' => 'contact_phone',
                'value' => '+1 (555) 123-4567',
                'type' => 'phone',
                'group' => 'contact',
                'label' => 'Contact Phone',
                'description' => 'Main contact phone number',
                'sort_order' => 2,
            ],
            [
                'key' => 'contact_address',
                'value' => '123 Fashion Street, Style City, SC 12345',
                'type' => 'textarea',
                'group' => 'contact',
                'label' => 'Contact Address',
                'description' => 'Physical business address',
                'sort_order' => 3,
            ],

            // About Information
            [
                'key' => 'about_us',
                'value' => 'We are a premium fashion accessories company dedicated to providing high-quality products that enhance your style.',
                'type' => 'textarea',
                'group' => 'general',
                'label' => 'About Us',
                'description' => 'Brief description about your company',
                'sort_order' => 10,
            ],

            // Social Media
            [
                'key' => 'facebook_url',
                'value' => null,
                'type' => 'url',
                'group' => 'social',
                'label' => 'Facebook URL',
                'description' => 'Link to your Facebook page',
                'sort_order' => 1,
            ],
            [
                'key' => 'instagram_url',
                'value' => null,
                'type' => 'url',
                'group' => 'social',
                'label' => 'Instagram URL',
                'description' => 'Link to your Instagram profile',
                'sort_order' => 2,
            ],
            [
                'key' => 'twitter_url',
                'value' => null,
                'type' => 'url',
                'group' => 'social',
                'label' => 'Twitter URL',
                'description' => 'Link to your Twitter profile',
                'sort_order' => 3,
            ],

            // SEO Settings
            [
                'key' => 'seo_title',
                'value' => 'Roluxe Accessories - Premium Fashion Accessories',
                'type' => 'text',
                'group' => 'seo',
                'label' => 'SEO Title',
                'description' => 'Default page title for SEO',
                'sort_order' => 1,
            ],
            [
                'key' => 'seo_description',
                'value' => 'Discover premium fashion accessories at Roluxe. High-quality bags, jewelry, and accessories to complete your style.',
                'type' => 'textarea',
                'group' => 'seo',
                'label' => 'SEO Description',
                'description' => 'Default meta description for SEO',
                'sort_order' => 2,
            ],

            // Business Settings
            [
                'key' => 'business_hours',
                'value' => json_encode([
                    'monday' => '9:00 AM - 6:00 PM',
                    'tuesday' => '9:00 AM - 6:00 PM',
                    'wednesday' => '9:00 AM - 6:00 PM',
                    'thursday' => '9:00 AM - 6:00 PM',
                    'friday' => '9:00 AM - 6:00 PM',
                    'saturday' => '10:00 AM - 4:00 PM',
                    'sunday' => 'Closed',
                ]),
                'type' => 'json',
                'group' => 'contact',
                'label' => 'Business Hours',
                'description' => 'Your business operating hours',
                'sort_order' => 10,
            ],

            // Payment & Shipping
            [
                'key' => 'free_shipping_threshold',
                'value' => '50',
                'type' => 'float',
                'group' => 'shipping',
                'label' => 'Free Shipping Threshold',
                'description' => 'Minimum order amount for free shipping',
                'sort_order' => 1,
            ],
            [
                'key' => 'currency_symbol',
                'value' => '$',
                'type' => 'text',
                'group' => 'payment',
                'label' => 'Currency Symbol',
                'description' => 'Symbol to display for prices',
                'sort_order' => 1,
            ],
            [
                'key' => 'site_short_name',
                'value' => 'Roluxe',
                'type' => 'text',
                'group' => 'general',
                'label' => 'Site Short Name',
                'description' => 'Short name for your website, used in URLs and titles',
                'sort_order' => 11,
            ]
        ];

        foreach ($configurations as $config) {
            Configuration::updateOrCreate(
                ['key' => $config['key']],
                $config
            );
        }
    }
}
