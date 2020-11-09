<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Category
 *
 * @mixin Builder
 */
class Category extends Model
{

    protected $fillable = [
      'name'
    ];
}
