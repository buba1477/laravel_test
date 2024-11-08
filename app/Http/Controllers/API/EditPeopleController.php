<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\People\StoreRequest;
use App\Http\Requests\People\UpdateRequest;
use App\Http\Resources\EditResource;
use App\Models\API\PeopleFile;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EditPeopleController extends Controller
{

    public function __invoke(UpdateRequest $request, Person $person)
    {

         $data = $request->validated();
         $files = $request->file('file');
         $filesDatabase = $person->peopleFiles()->get()->toArray();

         unset($data['file']);
       PeopleFile::where('id_people', $person->id)->delete();

     foreach ($filesDatabase as $fileData) {
         if (Storage::exists($fileData['file_path'])) {
             Storage::delete($fileData['file_path']);
             //dd ("Файл удален");
         } else {
             dd ("Файл не найден.");
         }
     }

        foreach ($files as $file) {

            $filePath = $file->store('local');
            $fileName = $file->getClientOriginalName();

            $existingFile = PeopleFile::where('file_name', $fileName)->where('id_people', $person->id)->first();
            if (!$existingFile) {
                PeopleFile::create([
                    'file_path' => $filePath,
                    'file_name' => $fileName,
                    'id_people' => $person->id
                ]);
            }
        }

        $result = $person->update($data);
        return $result;
    }
}
