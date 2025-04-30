<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class category extends Model
{
    use HasFactory;

    protected   $fillable = [
        'title',
        "slug",
        'visibility',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Relations with items
    public function items(){
        return $this->hasMany(item::class);
    }
}