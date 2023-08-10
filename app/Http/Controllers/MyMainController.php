<?php

namespace App\Http\Controllers;

use App\Models\Autors;
use App\Models\Post;
use Illuminate\Http\Request;

class MyMainController extends Controller
{
     function index(){
       return view('main');
         //dd('end main');
     }
}
