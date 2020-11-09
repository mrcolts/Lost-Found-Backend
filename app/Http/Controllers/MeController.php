<?php


namespace App\Http\Controllers;


use App\Http\Resources\MeItemsResource;
use App\Http\Resources\MeResource;
use App\Http\Traits\AuthTrait;
use App\Models\User;

class MeController extends BaseController
{
    use AuthTrait;

    public function index()
    {
        /** @var User $me */
        $me = $this->takeUser();

        return $this->sendResponse(
            MeResource::make($me),
            'Logged in successfully.'
        );
    }

    public function items_index()
    {
        $me = $this->takeUser();
        $me_items = $me->items()->with(['status']);

        return $this->sendResponse(
            MeItemsResource::collection($me_items),
            'Logged in successfully.'
        );
    }
}
