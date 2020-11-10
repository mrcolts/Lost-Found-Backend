<?php


namespace App\Http\Controllers;


use App\Http\Traits\AuthTrait;
use App\Models\User;
use App\Models\UserItem;
use App\Notifications\FoundNotification;
use Illuminate\Http\Request;

class FoundItemController extends BaseController
{
    use AuthTrait;

    public function store(Request $request)
    {
        $request['item_id'] = $request->route('item_id');
        $request->validate([
            'item_id' => ['required', 'exists:user_items,id'],
            'location' => ['nullable', 'string']
        ]);

        if ($me = $this->takeUser())
        {
            $phone = $me->phone;
            $karma = $me->karma;
            $me->update([
                'karma' => $karma + 100
            ]);
        }
        else
        {
            $request->validate([
                'phone' => ['required', 'string'],
//                'description' => ['required', 'string'],
//                'category' => ['required', 'uuid', 'exists:categories,id'],
//                'image' => ['nullable', 'image', 'max:8192'],
            ]);
            $phone = $request['phone'];
        }
        $location = $request['location'];

        $item = UserItem::find($request['item_id']);

        /** @var User $user */
        $user = $item->user();

        $user->notify(new FoundNotification(
            $user->full_name,
            $item->name,
            $phone,
            $location
        ));


        return 'anonymous user';
    }
}
