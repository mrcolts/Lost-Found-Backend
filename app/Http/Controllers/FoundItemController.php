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
            if ($me->items()->find($request['item_id']))
            {
                return redirect()->to(config('common.web.self_item').'/'.$request['item_id']);
            }

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

        return $this->sendResponse(null, 'Request sent successfully.');
    }
}
