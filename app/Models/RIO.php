<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RIO extends Model
{
    use HasFactory;
    protected $table = 'rio';
    protected $fillable = [
        'model_id',
        'issue',
        'detail',
        'action',
        'user_id',
        'due_date',
        'status'
    ];

    public function model()
    {
        return $this->belongsTo(ModelProduct::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
