<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\API\PeopleFile;
use App\Models\Person;



class DeleteFileController extends Controller
{
    public function __invoke(PeopleFile $file)
    {
        $res = $file->delete();
        return  $res ;
    }
}
