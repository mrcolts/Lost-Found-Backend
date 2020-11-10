<?php


namespace App\Http\Controllers;


use App\Helpers\ImageUploaderHelper;
use App\Http\Requests\UserItemStoreRequest;
use App\Http\Resources\MeItemsResource;
use App\Http\Resources\MeResource;
use App\Http\Traits\AuthTrait;
use App\Models\Status;
use App\Models\User;
use App\Notifications\NewItemNotification;

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
        $me_items = $me->items()->with(['status', 'category'])->get();

        return $this->sendResponse(
            MeItemsResource::collection($me_items),
            'Logged in successfully.'
        );
    }

    public function item_store(UserItemStoreRequest $request)
    {
        $me = $this->takeUser();
        $status = Status::where('name', 'along')->first();
        $image = $request['img_index'] ? ImageUploaderHelper::upload($request['img_index']) : null;

        $me_items = $me->items()->create([
            'name' => $request['name'],
            'description' => $request['description'],
            'img_index' => $image,
            'category_id' => $request['category'],
            'status_id' => $status->id
        ]);


        $me->notify(new NewItemNotification(
            $me->full_name,
            $me_items->name,
            $me_items->id
        ));

        return $this->sendResponse(
            null,
            'Item stored successfully.'
        );
    }
}
