<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $appends = [
        'created_date',
        'created_time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->format('Y年m月d日');
    }

    public function getCreatedTimeAttribute()
    {
        return $this->created_at->format('H時i分s秒');
    }
}
