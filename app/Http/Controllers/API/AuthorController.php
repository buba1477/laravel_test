<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthorController extends Controller
{

    public function __invoke()
    {
       $users = Post::all();

        return $users;
    }
}
