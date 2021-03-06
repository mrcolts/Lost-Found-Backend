<?php


namespace App\Http\Controllers;


use App\Http\Requests\LoginRequest;

class AuthController extends BaseController
{
    public function login(LoginRequest $request)
    {
        if (!$token = auth()->attempt($request->only(['email', 'password']))) {
            return $this->sendError('Wrong password', null, 418);
        }

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