<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Services\Person\Service;

class BaseController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
         //dd($service);
    }

}

