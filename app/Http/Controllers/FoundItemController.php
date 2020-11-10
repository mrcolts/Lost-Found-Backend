<?php


namespace App\Http\Controllers;


use App\Http\Requests\PostStoreRequest;
use App\Http\Traits\AuthTrait;
use Faker\Provider\Image;
use Illuminate\Http\Request;

class FoundItemController extends BaseController
{
    use AuthTrait;

    public function store(Request $request)
    {
        $request['item_id'] = $request->route('item_id');
        $request->validate([
            'item_id' => ['required', 'exists:user_items,id'],
        ]);

        if ($me = $this->takeUser())
        {
            return $me->full_name;
        }

        $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'category' => ['required', 'uuid', 'exists:categories,id'],
            'image' => ['nullable', 'image', 'max:8192'],
        ]);

        return 'anonymous user';
    }
}
