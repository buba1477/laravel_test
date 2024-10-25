<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\People\StoreRequest;
use App\Http\Resources\UserResource;
use App\Models\API\PeopleFile;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GetPeopleController extends Controller
{

    public function __invoke(Request $request)
    {
//        $res = Person::all()->sortBy('id');
        $res = Person::join('people_files', 'people.id', '=', 'people_files.id_people')
            ->select('people.*', 'people_files.file_path')
            ->get();
//        $res = PeopleFile::with('people')->get();
        return $res;
        $res = UserResource::collection($res)->resolve();

    }
}
