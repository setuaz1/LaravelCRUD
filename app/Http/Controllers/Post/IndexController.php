<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
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
        //dd($data);

        $query = Post::query();

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate(10);

        return view('post.index', compact('posts'));
    }
}
