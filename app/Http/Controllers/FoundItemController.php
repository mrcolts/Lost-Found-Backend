<?php


namespace App\Http\Controllers;


use App\Http\Traits\AuthTrait;

class FoundItemController extends BaseController
{
    use AuthTrait;

    public function post()
    {
        if($me = $this->takeUser())
        {
            return $me->full_name;
        }
        return 'anonymous user';

    }
}
