<?php


namespace App\Http\Controllers;


use App\Http\Requests\LoginRequest;
use App\Http\Traits\AuthTrait;
use App\Models\User;

class MeController extends BaseController
{
    use AuthTrait;

    public function index()
    {
        $me = $this->takeUser();

        return $this->sendResponse(
            [
                'accessToken' => $token,
                'tokenType' => 'Bearer',
                'expiresIn' => time() + config('jwt.ttl') * 60
            ],
            'Logged in successfully.'
        );
    }

    public function refresh()
    {
        if (!$token = auth()->refresh()) {
            return $this->sendError('Access denied.', null, 418);
        }

        return $this->sendResponse(
            [
                'accessToken' => $token,
                'tokenType' => 'Bearer',
                'expiresIn' => time() + config('jwt.ttl') * 60
            ],
            'Token refreshed successfully.'
        );
    }
}