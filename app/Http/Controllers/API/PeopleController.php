<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\People\StoreRequest;
use App\Models\Person;

class PeopleController extends Controller
{

    public function __invoke(StoreRequest $request)
    {
       $data = $request->validated();
       $result = Person::create($data);
        return $result;
    }
}
