<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\People\StoreRequest;
use App\Models\Person;
use Illuminate\Http\Request;

class PeopleController extends Controller
{

    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $file = $request->file('file');
        $filePath = $file->store('public');
        $fileName = $file->getClientOriginalName();

        // Удалить ключ 'file' из массива $data
        unset($data['file']);

        // Добавить ключ 'file_path' с путем к файлу
        $data['file_path'] = $filePath;

        $data['author'] = auth()->user()->name;

        $result = Person::create($data);
        $result['storage_path'] = storage_path('app/public/' . $filePath);
        $result['file_name'] = $fileName;
        return response()->json([
            'fileName' => $fileName,
            'file' => base64_encode(file_get_contents($file)),
        ]);
    }
}
