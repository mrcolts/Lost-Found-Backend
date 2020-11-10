<?php


namespace App\Http\Controllers;


use App\Http\Requests\PostStoreRequest;
use App\Http\Traits\AuthTrait;

class FoundItemController extends BaseController
{
    use AuthTrait;

    public function store($request)
    {
        if($me = $this->takeUser())
        {
            return $me->full_name;
        }

        $request = (new PostStoreRequest())->validate($request);

        return 'anonymous user';

    }
}
