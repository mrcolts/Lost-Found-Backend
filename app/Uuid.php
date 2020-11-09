<?php


namespace App;


use Illuminate\Support\Str;

trait Uuid
{
    /**
     * Boot functions from Laravel
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(static function ($model) {
            $model->incrementing = false;
            $model->keyType = 'string';
            $model->{$model->getKeyName()} = Str::uuid()->toString();
        });
    }
}
