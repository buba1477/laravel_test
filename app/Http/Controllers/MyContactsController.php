<?php

namespace App\Http\Controllers;

use App\Models\Autors;
use App\Models\Post;
use Illuminate\Http\Request;

class MyContactsController extends Controller
{
     function index(){
      return view('contacts');
         //dd('contacts');
     }
}
