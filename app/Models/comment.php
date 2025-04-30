<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class comment extends Model
{
    use HasFactory;

    protected $fillable=[
        "comment",
        "status",
        "item_id",
        "user_id",
    ];

    public function getRouteKeyName()
    {
        return 'id';
    }

    // Relation with user
    public function user(){
        return $this->belongsTo(user::class);
    }

    // Relation with item
    public function item(){
        return $this->belongsTo(item::class);
    }
}