<?php

namespace App\Models;

use App\Uuid;
use Illuminate\Database\Eloquent\Model;

class UserItem extends Model
{
    use Uuid;

    protected $fillable = [
      'name',
      'img_index',
      'status'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
