<?php


namespace App\Http\Controllers;


use App\Helpers\ImageUploaderHelper;
use App\Http\Requests\PostGetRequest;
use App\Http\Requests\PostStoreRequest;
use App\Http\Resources\PostsResource;
use App\Http\Traits\AuthTrait;
use App\Models\Post;
use App\Models\User;

class PostController extends BaseController
{

    use AuthTrait;

    public function user_index()
    {
        $me = $this->takeUser();

        $posts = $me
            ->posts()
            ->with(['category', 'user'])
            ->orderBy('created_at', 'desc')
            ->get();

        return $this->sendResponse(
            PostsResource::collection($posts),
            'Posts retrieved successfully.'
        );

    }

    public function store(PostStoreRequest $request)
    {
        /** @var User $me */
        $me = $this->takeUser();

        $image = ImageUploaderHelper::upload($request['img_index']);

        /** @var Post $post */
        $me->posts()->create([
            'title' => $request['title'],
            'description' => $request['description'],
            'location'=>$request['location'],
            'img_index' => $image,
            'category_id' => $request['category'],
        ]);

        return $this->sendResponse(
            null,
            'Post created successfully.'
        );
    }

    public function delete(PostGetRequest $request)
    {
        /** @var User $me */
        $me = $this->takeUser();

        /** @var Post $post */
        $post = $me->posts()->find($request['post_id']);
        $post->delete();

        return $this->sendResponse(
            null,
            'Post deleted successfully.');
    }

    public function index()
    {
        $posts = Post
            ::with(['category', 'user'])
            ->orderBy('created_at', 'desc')
            ->get();

        return $this->sendResponse(
            PostsResource::collection($posts),
            'Posts retrieved successfully.'
        );
    }


}
