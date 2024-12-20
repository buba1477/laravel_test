<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\People\StoreRequest;
use App\Http\Requests\People\UpdateRequest;
use App\Http\Resources\EditResource;
use App\Models\API\PeopleFile;
use App\Models\Person;
use App\Services\Person\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EditPeopleController extends Service
{

    public function __invoke(UpdateRequest $request, Person $person)
    {
         $data = $request->validated();

         $this->update($data, $request, $person);

    }
}
