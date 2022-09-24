<?php

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/**
 * @throws GuzzleException
 */
function getContents(string $uri): string
{
    $client = new Client([
        'base_uri' => BASE_URI,
        'timeout' => REQUEST_TIMEOUT,
    ]);

    return $client->request('GET', $uri)->getBody()->getContents();
}
