<?php

namespace App\Models;

use App\Uuid;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use Uuid;

    protected $fillable = [
        'phone',
        'address',
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
