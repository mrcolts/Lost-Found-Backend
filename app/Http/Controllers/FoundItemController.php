<?php


namespace App\Http\Controllers;


use App\Http\Traits\AuthTrait;

class FoundItemController extends BaseController
{
    use AuthTrait;

    public function store()
    {
        $me = $this->takeUser();
        if( is_null($me))
        {
            return $me->full_name;
        }
        return 'anonymous user';

    }
}
