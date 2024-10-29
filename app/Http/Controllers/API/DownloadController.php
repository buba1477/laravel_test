<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\People\StoreRequest;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{

    public function __invoke(Request $request)
    {
        //Загружаем файл по пути
        $path = $request->path;
        $name = $request->name;
        $id = $request->id;

        $fileContents = Storage::get($path);
        return response()->json([
            'file' => base64_encode($fileContents),
            'name' => $name,
            'id' => $id
        ]);
    }
}
