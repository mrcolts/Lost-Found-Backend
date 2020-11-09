<?php

namespace App\Models;

use App\Uuid;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Uuid;

    protected $fillable = [
        'title',
        'description',
        'img_index',
        'category_id'
    ];

    public function user()
    {
        return  $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
