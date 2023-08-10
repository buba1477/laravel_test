<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Autors;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {


        $data = $request->validated();
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate(10);
        //dd($posts);


        //фильтрация лайт
        ////     $query = Post::query();
//
//     if(isset($data['category_id'])){
//         $query->where('category_id', $data['category_id']);
//     }
//
//     if(isset($data['title'])){
//         $query->where('title', 'like', "%{$data['title']}%");
//     }
//
//     if(isset($data['post_content'])){
//         $query->where('post_content', 'like', "%{$data['post_content']}%");
//     }
//     $posts = $query->get();


        //$posts = Post::paginate(10);

        //$category = Category::find(1);
        //$post = Post::find(3);
        //$tag = Tag::find(4);
        //$posts= Post::where('category_id', $category->id )->get();
        return view('post.index', compact('posts'));
        //dd($post->category);

    }
}
