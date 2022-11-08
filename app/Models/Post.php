<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'excerpt',
        'body',
        'min_to_read',
        'image_path',
        'is_published',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function meta(){
        return $this->hasOne(PostMeta::class);
    }
}
