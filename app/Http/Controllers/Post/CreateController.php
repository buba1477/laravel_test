<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Autors;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class CreateController extends BaseController
{
 public function __invoke()
 {
     $categories = Category::all();
     $tags = Tag::all();
     //dd($categories, $tags);
     return view('admin.post.create', compact('categories', 'tags'));
 }
}
