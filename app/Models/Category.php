<?php

namespace App\Models;

use App\Uuid;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Category
 *
 * @mixin Builder
 */
class Category extends Model
{
    use Uuid;

    protected $fillable = [
      'name'
    ];
}
