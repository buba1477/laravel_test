<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Autors;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use function Couchbase\defaultDecoder;

class MyPostController extends Controller
{
    function index()
    {
        $posts = Post::all();
        $category = Category::find(1);
        $post = Post::find(3);
        //$tag = Tag::find(4);
        //$posts= Post::where('category_id', $category->id )->get();
        return view('post.index', compact('posts'));
        //dd($post->category);
        //dd($posts);

    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
        //dd($data);
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required | string',
            'content' => 'string',
            'image' => 'string',
            'likes' => 'integer',
            'category_id' => 'integer',
            'tags' => ''
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
        //dd($tags , $data);

        $post = Post::create($data);
//Первый способ теги раскидать
//        foreach ($tags as $tag) {
//            PostTag::firstOrCreate([
//                'tag_id' => $tag,
//                'post_id' => $post->id
//            ]);
//        }https://www.youtube.com/watch?v=3sx5pP5o5WA&list=PLd2_Os8Cj3t8pnG4ubQemoqnTwf0VFEtU&index=31

//        Второй способ с помощью метода attach
        $post->tags()->attach($tags);

        return redirect()->route('post.index');

    }

    public function show(Post $post)
    {

        // dd($post);
        return view('post.show', compact('post'));

    }


    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        //dd($post);
        return view('post.edit', compact('post', 'categories', 'tags'));
    }


    public function update(Post $post)
    {

        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'likes' => 'integer',
            'id_author' => 'integer',
            'category_id' => 'integer',
            'tags' => ''
        ]);


        $tags = $data['tags'];

        dd($data);

        unset($data['tags']);
        $post->update($data);
        //$post->tags()->sync($tags);

        return redirect()->route('post.show', $post->id);

    }


    public function destroy(Post $post)
    {
        //dd($post);
        $post->delete();
        return redirect()->route('post.index');


    }
//
//    public function delete()
//    {
//        $post = Post::find(9);
//        $post->delete();
//        dd('delete');
//
////        Восстановление удаленной записи в DB после мягкого удаления
////        $post = Post::withTrashed()->find(3);
////        $post->restore();
//    }
//
//    //Метод firstOrCreate например проверять на дубликаты в базе
//    //updateOrCreate метод обновления однаковых атрибутов таблицы

    public function firstOrCreate()

    {
        $post = Post::find(2);
        $anotherPost = [
            'title' => 'new title of post from phpstorm testing',
            'post_content' => 'some content',
            'image' => 'anotherblabla.jpg',
            'likes' => 50000,
            'is_published' => 1,
            'author_id' => 2,
        ];

        $myPost = Post::firstOrCreate(['title' => 'new title of post from phpstorm testing'],
            $anotherPost
        );

        dump($myPost->likes);
        dd('finished');

    }

    public function updateOrCreate()
    {

        $anotherPost = [
            'title' => 'произошел create',
            'content' => 'произошел create',
            'image' => 'anotherblabla.jpg',
            'likes' => 4000,
            'is_published' => 0,
            'author_id' => 1,
        ];

        $post = Post::updateOrCreate(['title' => 'new title create'], $anotherPost);
        dd('finished');
    }
}
