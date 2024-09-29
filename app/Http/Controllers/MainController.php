<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
     function __invoke(){
       return view('port');
     }
}
