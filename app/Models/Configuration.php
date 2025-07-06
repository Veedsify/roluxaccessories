<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Configuration extends Model
{
    protected $fillable = [
        'key',
        'value',
        'type',
        'group',
        'label',
        'description',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Get the value attribute with appropriate casting based on type
     */
    protected function value(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                return match ($this->type) {
                    'json' => $value ? (json_decode($value, true) ?: []) : [],
                    'boolean' => (bool) $value,
                    'integer' => (int) $value,
                    'float' => (float) $value,
                    default => $value,
                };
            },
            set: function ($value) {
                return match ($this->type) {
                    'json' => is_array($value) ? json_encode($value) : $value,
                    'boolean' => $value ? '1' : '0',
                    default => (string) $value,
                };
            }
        );
    }

    /**
     * Get configuration by key
     */
    public static function get(string $key, $default = null)
    {
        try {
            $config = static::where('key', $key)->where('is_active', true)->first();
            return $config ? $config->value : $default;
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Configuration get error for key: ' . $key, ['error' => $e->getMessage()]);
            return $default;
        }
    }

    /**
     * Set configuration value
     */
    public static function set(string $key, $value, string $type = 'text', string $group = 'general', ?string $label = null): void
    {
        static::updateOrCreate(
            ['key' => $key],
            [
                'value' => $value,
                'type' => $type,
                'group' => $group,
                'label' => $label ?? ucfirst(str_replace('_', ' ', $key)),
                'is_active' => true,
            ]
        );
    }

    /**
     * Scope to filter by group
     */
    public function scopeByGroup($query, string $group)
    {
        return $query->where('group', $group);
    }

    /**
     * Scope to filter active configurations
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
