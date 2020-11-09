<?php


namespace App\Http\Controllers;


use App\Http\Resources\StatusResource;
use App\Models\Status;

class StatusController extends BaseController
{
    public function index()
    {
        $statuses = Status::all();
        return $this->sendResponse(
            StatusResource::collection($statuses),
            'Statuses retrieved successfully');
    }

}
