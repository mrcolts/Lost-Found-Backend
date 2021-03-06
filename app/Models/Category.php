<?php

namespace App\Models;

use App\Uuid;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class Category extends Model
{
    use Uuid;

    protected $fillable = [
      'name'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
