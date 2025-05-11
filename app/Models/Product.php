<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'image',
    ];
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

}
