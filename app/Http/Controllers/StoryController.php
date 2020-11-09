<?php


namespace App\Http\Controllers;


use App\Http\Requests\PostGetRequest;
use App\Http\Requests\PostStoreRequest;
use App\Http\Resources\PostsResource;
use App\Http\Traits\AuthTrait;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class StoryController extends BaseController
{
    use AuthTrait;

    public function index()
    {
        $stories = Category::withCount('posts')
            ->orderBy('posts_count', 'desc')
            ->paginate(10);

        return $this->sendResponse(
            PostsResource::collection($stories),
            'Posts retrieved successfully.'
        );

    }
}
