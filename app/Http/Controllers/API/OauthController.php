<?php

namespace App\Http\Controllers\API;

use App\Components\ImportDataClient;
use App\Http\Controllers\Controller;
use App\Http\Requests\People\StoreRequest;
use App\Models\Person;
use Illuminate\Http\Request;

class OauthController extends Controller
{

    public function __invoke(Person $person)
    {

        $import = new ImportDataClient();
        $response = $import->client->request('GET', 'me');
        $data = json_decode($response->getBody()->getContents());
        return $data;
    }
}
