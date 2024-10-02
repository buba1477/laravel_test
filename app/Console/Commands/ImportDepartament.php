<?php

namespace App\Console\Commands;

use App\Components\ImportDataClient;
use Illuminate\Console\Command;

class ImportDepartament extends Command
{

    protected $signature = 'app:importDepartament';


    protected $description = 'oauth fucking';

    public function handle()
    {
        $import = new ImportDataClient();
        $response = $import->client->request('GET', '');
        $data = json_decode($response->getBody()->getContents());
        dd($data);
    }
}
