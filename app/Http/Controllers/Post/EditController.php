<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Autors;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class EditController extends BaseController
{
 public function __invoke(Post $post)
 {
     $categories = Category::all();
     $tags = Tag::all();
     //dd($post);
     return view('post.edit', compact('post', 'categories', 'tags'));
 }
}
