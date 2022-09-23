<?php

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/**
 * @throws GuzzleException
 */
function getClient(): Client
{
    return new Client([
        'base_uri' => BASE_URI,
        'timeout' => REQUEST_TIMEOUT,
    ]);
}

/**
 * @throws GuzzleException
 */
function getContents(string $uri): string
{
    return getClient()->request('GET', $uri)->getBody()->getContents();
}
