<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
class AuthorController extends Controller
{

    public function __invoke(Request $request)
    {
       $res = Post::all();
        return $res;
    }
}
