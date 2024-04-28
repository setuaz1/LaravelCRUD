<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Container\BindingResolutionException;

class IndexController extends BaseController
{
    /**
     * @throws BindingResolutionException
     * @throws AuthorizationException
     */
    public function __invoke(FilterRequest $request)
    {

        //$this->authorize('view', auth()->user());

        //dd(auth()->user()->role);


        $data = $request->validated();

        $page = $data['page'] ?? 1;
        $perPage = $data['page'] ?? 10;

        $query = Post::query();

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);

        $posts = Post::filter($filter)->paginate($perPage, ['*'], 'page', $page);

        return PostResource::collection($posts);

        //return view('post.index', compact('posts'));
    }
}
