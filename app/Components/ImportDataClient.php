<?php

namespace App\Components;

use GuzzleHttp\Client;

class ImportDataClient
{
      public $client;

    /**
     * @param $client
     */
    public function __construct()
    {

        $this->client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost:8080',
            // You can set any number of default request options.
            'timeout'  => 2.0,
            'verify' => false,
            'headers' => [
                'Authorization' => '94a08da1fecbb6e8b46990538c7b50b2'
            ]
        ]);
    }
}
