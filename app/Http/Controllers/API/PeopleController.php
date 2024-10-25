<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\People\StoreRequest;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\API\PeopleFile;

class PeopleController extends Controller
{

    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        $data['author'] = auth()->user()->name;
        $files = $request->file('file');
        $exists = Person::where('title', $data['title'])->exists();
        unset($data['file']);

        if(empty($exists)) {
            $result = Person::create($data);
            foreach ($files as $file) {
                $filePath = $file->store('local');
                $fileName = $file->getClientOriginalName();
                PeopleFile::firstOrCreate([
                    'file_path' => $filePath,
                    'file_name' => $fileName,
                    'id_people' => $result['id']
                ]);
            }
            return $result;
        }else{
            return 'Запись уже существует!!!';
        }


//        $filePath = $file->store('local');
//        $fileName = $file->getClientOriginalName();
        //загрузка файла по пути
//        $fileContents = Storage::get($filePath);
//        $fileContents = file_get_contents(storage_path('app/' . $filePath));
        // Удалить ключ 'file' из массива $data
//        unset($data['file']);

        // Добавить ключ 'file_path' с путем к файлу
//        $data['file_path'] = $filePath;

//        $data['author'] = auth()->user()->name;

//        $result = Person::create($data);
//        $result['storage_path'] = $filePath;
//        $result['file_name'] = $fileName;

        //Storage::delete($filePath);
//        return $result;
//        return response()->json([
//            'fileName' => $fileName,
//            'file' => base64_encode($fileContents),
//        ]);
    }
}
