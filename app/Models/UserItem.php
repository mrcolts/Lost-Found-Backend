<?php

namespace App\Models;

use App\Uuid;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class UserItem extends Model
{
    use Uuid;

    protected $fillable = [
        'name',
        'img_index',
        'category_id',
        'description',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
