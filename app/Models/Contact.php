<?php

namespace App\Models;

use App\Uuid;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class Contact extends Model
{
    use Uuid;

    protected $fillable = [
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
