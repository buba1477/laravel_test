<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Person;


class GetUserController extends Controller
{

    public function __invoke(Person $person)
    {
        $user = new UserResource($person);
       // dd($res);
        return  $user;
    }
}
