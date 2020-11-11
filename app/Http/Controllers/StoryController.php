<?php


namespace App\Http\Controllers;


use App\Http\Requests\PostGetRequest;
use App\Http\Requests\PostStoreRequest;
use App\Http\Resources\PostsResource;
use App\Http\Resources\StoriesResource;
use App\Http\Traits\AuthTrait;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class StoryController extends BaseController
{
    use AuthTrait;

    public function index()
    {
//        $stories = Category::with('posts')
//            ->withCount('posts')
//            ->orderBy('posts_count', 'desc');
//
//        return $this->sendResponse(
//            StoriesResource::collection($stories->get()),
//            'Stories retrieved successfully.'
//        );


//        $stories = Category::withCount('posts')
//            ->with(['posts' => function ($query) {
//            }])
//            ->orderBy('posts_count', 'desc')
//            ->get();
//
//        return $this->sendResponse(
//            StoriesResource::collection($stories),
//            'Stories retrieved successfully.'
//        );

        $posts = Post::all()->orderBy('created_at','desc')->get();
        return $this->sendResponse(PostsResource::collection($posts), 'Stories retrieved successfully.');
    }
}
