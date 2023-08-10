<?php

namespace App\Http\Controllers;

use App\Models\Autors;
use App\Models\Post;
use Illuminate\Http\Request;

class MyAboutController extends Controller
{
     function index(){
       return view('about');
         //dd('about');
     }
}
