<?php


namespace App\Http\Controllers;


use App\Http\Requests\PostStoreRequest;
use App\Http\Traits\AuthTrait;

class FoundItemController extends BaseController
{
    use AuthTrait;

    public function store(PostStoreRequest $request)
    {
        if($me = $this->takeUser())
        {
            return $me->full_name;
        }

        return 'anonymous user';

    }
}
