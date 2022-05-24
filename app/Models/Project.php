<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'project';
    protected $fillable = [
        'model_id',
        'item_id',
        'user_id',
        'remark',
        'status'
    ];

    public function model()
    {
        return $this->belongsTo(ModelProduct::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
