<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = 'task';
    protected $fillable = [
        'task',
        'project',
        'day',
        'user_id',
        'start_date',
        'start_time',
        'end_time',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
