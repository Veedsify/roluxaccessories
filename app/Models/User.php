<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        "name",
        "email",
        "password",
        "is_guest",
        "is_admin",
        "is_active",
        "is_verified",
        "role", // customer, admin, vendor
        "status", // active, inactive, suspended
        "phone",
        "country",
        "address",
        "gender",
        "profile_picture",
        "two_factor_secret",
        "last_login_at",
        "email_verified_at",
        "remember_token",
        "created_at",
        "updated_at",
    ];

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function ratings()
    {
        return $this->hasMany(ProductRating::class);
    }
    public function ratingComments()
    {
        return $this->hasMany(ProductRatingComment::class);
    }
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
