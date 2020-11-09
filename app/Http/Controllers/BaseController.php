<?php

namespace App\Http\Controllers;

use App\Http\Traits\ResponseTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as SirSuperSexyBatmanGachimuchiMegaMasterBossOfTheGymMainGeneralPrimaryParentController;

class BaseController extends SirSuperSexyBatmanGachimuchiMegaMasterBossOfTheGymMainGeneralPrimaryParentController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, ResponseTrait;

    public function sendFile($content, $filename)
    {
        return $this->file($content, $filename);
    }

    public function sendResponse($result, string $message): JsonResponse
    {
        return $this->success($result, $message);
    }

    public function sendError($error, $error_messages = [], $code = 404): JsonResponse
    {
        return $this->error($error, $error_messages, $code);
    }
}
