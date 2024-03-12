<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "slug",
        "old_price",
        "price",
        "count",
        "category_id",
        "active",
        "img_1",
        "img_2",
        "img_3"
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }



    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getImage1()
    {
        if ($this->img_1) {
            return "storage/$this->img_1";
        }
        return "storage/image/default/default.jpg";
    }

    public function getImage2()
    {
        if ($this->img_2) {
            return "storage/$this->img_2";
        }
        return "storage/image/default/default.jpg";
    }

    public function getImage3()
    {
        if ($this->img_3) {
            return "storage/$this->img_3";
        }
        return "storage/image/default/default.jpg";
    }
}
