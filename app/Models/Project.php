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
        'sub_item_id',
        'user_id',
        'remark',
        'status'
    ];

    protected $primaryKey = 'id';

    protected $casts = [
        'sub_item_id' => 'array',
    ];

    protected $status = [
        'Open',
        'Done',
        'Need Update',
        'Not Required',
        'On Progress'
    ];

    public function model()
    {
        return $this->belongsTo(ModelProduct::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sub_item()
    {
        return $this->belongsTo(Sub_item::class, 'sub_item_id');
    }


}
