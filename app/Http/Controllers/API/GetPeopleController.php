<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\People\StoreRequest;
use App\Models\Person;
use Illuminate\Http\Request;

class GetPeopleController extends Controller
{

    public function __invoke(Request $request)
    {
        $res = Person::all();
        return $res;
    }
}
