<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        "phone_number",
        "avatar",
        "bank_cart",
        "bank_cart_age",
        "cvv"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getAvatar()
    {
        if ($this->avatar) {
            return "storage/{$this->avatar}";
        } else {
            return "storage/avatar/default/default.jpg";
        }
    }

    public function deleteAvatar()
    {
        if ($this->avatar) {
            return $avatar = Storage::delete($this->avatar);
        } else {
            return null;
        }
    }

    public function getBankCart()
    {
        if ($this->bank_cart and $this->bank_cart_age and $this->cvv) {
            return true;
        } else {
            return false;
        }
    }

    public function getAdmin()
    {
        if ($this->is_admin == 1) {
            return true;
        } else {
            return false;
        }
    }
}
