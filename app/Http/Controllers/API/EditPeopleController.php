<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\People\StoreRequest;
use App\Http\Requests\People\UpdateRequest;
use App\Models\Person;

class EditPeopleController extends Controller
{

    public function __invoke(UpdateRequest $request, $id)
    {
       $data = $request->validated();
       $result = Person::find($id)->update($data);
        return $result;
    }
}
