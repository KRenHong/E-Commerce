<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class item extends Model
{
    use HasFactory;
    protected $fillable = [
        "title",
        "slug",
        "description",
        "price",
        "Old_price",
        "in_Stock",
        "Qte",
        "Country_Mad",
        "image",
       // "Approve",
        "category_id"
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Relation with category
    public function category()
    {
      return $this->belongsTo(category::class);
    }

    // Relation wit comments
    public function comments(){
        return $this->hasMany(comment::class);
    }

    public function order(){
        return $this->belongsTo(order::class);
    }
}