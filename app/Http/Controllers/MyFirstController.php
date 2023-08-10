<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyFirstController extends Controller
{
     function index(){
       return '<div style="color:red">Welcome!!!!</div>';
     }
}
