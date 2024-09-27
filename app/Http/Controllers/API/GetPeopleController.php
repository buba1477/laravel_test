<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\People\StoreRequest;
use App\Http\Resources\UserResource;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GetPeopleController extends Controller
{

    public function __invoke(Request $request)
    {
        $res = Person::all()->sortBy('id');
        $res = UserResource::collection($res)->resolve();
        return $res;
    }
}
