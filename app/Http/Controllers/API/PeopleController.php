<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\People\StoreRequest;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\API\PeopleFile;

class PeopleController extends BaseController
{

    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();

        $this->service->store($data, $request);



    }
}
