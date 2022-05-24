<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_item extends Model
{
    use HasFactory;
    protected $table = 'sub_item';
    protected $fillable = [
        'name',
        'description',
        'item_id'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
