<?php

namespace App\Http\Controllers\Post;
use App\Http\Controllers\Controller;
use App\Models\Autors;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
 public function __invoke(Post $post)
 {
     // dd($post);
     return view('post.show', compact('post'));
 }
}
