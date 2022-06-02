<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'item';
    protected $fillable = [
        'name',
        'description'
    ];

    // public function sub_item()
    // {
    //     return $this->hasMany(Sub_item::class);
    // }
}
