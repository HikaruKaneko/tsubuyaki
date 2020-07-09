<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Resources\V1\PostResource;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * つぶやき　一覧
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
//        $posts = $request->user()->posts()->with(['user'])->get();
//        $posts = Post::where('created_at','>','2020-07-08')->get();
//        $posts = Post::where('created_at','>',Carbon::now())->orderBy('content','desc')->get();
//        $posts = Post::where('created_at','>',Carbon::now())->get();

        $posts = Post::where('created_at', '<', Carbon::now())->first();

        return new PostResource($posts);
    }

    /**
     * つぶやき　作成
     * @param PostRequest $request
     * @return PostResource
     */
    public function store(PostRequest $request)
    {
        $request->validated();

        $post = new Post();

        $post->content = $request->input('content');
        $post->user_id = $request->user()->id;

        $post->save();

        return new PostResource($post);
    }

    /**
     * 編集
     * @param Request $request
     * @param Post $post
     * @return PostResource
     * @throws \Illuminate\Validation\ValidationException
     */

    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'content' => 'required|string|min:1|max:140'
        ]);

        if ($request->has('content')) {
            $post->content = $request->input('content');
        }
        $post->update();

        return new PostResource($post);
    }

    /**
     * つぶやき　削除
     * @param Request $request
     * @param Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function delete(Request $request, Post $post)
    {
        $post->delete();

        return response('null', '204');
    }
}
