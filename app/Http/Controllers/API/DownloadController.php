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
       $arrFilePush = [];
       $arrFile = $request->all();

       foreach ($arrFile as $file) {
           $fileContents = Storage::get($file['file_path']);
           array_push($arrFilePush, response()->json([
               'file' => base64_encode($fileContents),
               'name' => $file['file_name'],
               'id' => $file['id']
           ]));
       }
        return $arrFilePush;
    }
}
