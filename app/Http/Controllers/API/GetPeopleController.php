<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\People\StoreRequest;
use App\Http\Resources\UserResource;
use App\Models\API\PeopleFile;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Storage;

class GetPeopleController extends Controller
{

    public function __invoke(Request $request)
    {
        //   $res = Person::all()->sortBy('id');
        //  $res = Person::join('people_files', 'people.id', '=', 'people_files.id_people')
        // ->select('people.*', 'people_files.file_path')
// ->get();
        $res = Person::with('peopleFiles')->get();

        // $res = Person::with('files')->get();
        // $model = Person::find(29)->forceDelete();
        //Storage::disk('local')->delete('local/YKxIMpLTH41uQWTN4osvvmw1Ei0iPgM4wkr0znWE.pdf');

        $res = UserResource::collection($res)->resolve();
        return $res;

    }
}
