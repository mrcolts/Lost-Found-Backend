<?php


namespace App\Http\Controllers;


use App\Http\Requests\PostStoreRequest;
use App\Http\Traits\AuthTrait;
use Illuminate\Http\Request;

class FoundItemController extends BaseController
{
    use AuthTrait;

    public function store(Request $request)
    {
        if($me = $this->takeUser())
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
