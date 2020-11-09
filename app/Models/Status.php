<?php

namespace App\Models;

use App\Uuid;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class Status extends Model
{
    use Uuid;

    protected $fillable = [
        'name'
    ];

    public function items()
    {
        return $this->hasMany(UserItem::class);
    }
}
