<?php


namespace App\Http\Traits;


use App\Models\User;

trait AuthTrait
{
    public function takeUser(): User
    {
        /** @var User $user */
        $user = auth()->user();
        return $user;
    }
}