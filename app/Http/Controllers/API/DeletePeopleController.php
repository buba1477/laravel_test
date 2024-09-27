<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Person;



class DeletePeopleController extends Controller
{
    public function __invoke(Person $person)
    {
        $person = $person->delete();
        return $person;
    }
}
