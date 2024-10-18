<?php

namespace App\Http\Controllers\API;

use App\Components\ImportDataClient;
use App\Http\Controllers\Controller;
use App\Http\Requests\People\StoreRequest;
use App\Models\Person;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class  OauthController extends Controller
{

    public function __invoke(Person $person)
    {

        $import = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost:8080/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
            'verify' => false,
            'headers' => [
                'Authorization' => '94a08da1fecbb6e8b46990538c7b50b2',
            ]
        ]);
        $response = $import->request('GET', 'me');
        $data = json_decode($response->getBody()->getContents());
        return $data;
    }
}
