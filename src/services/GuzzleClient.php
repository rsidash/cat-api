<?php

namespace GuzzleClient;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class GuzzleClient
{
    private const BASE_URI = 'https://api.thecatapi.com';
    private const REQUEST_TIMEOUT = '2.0';

    /**
     * @throws GuzzleException
     */
    public function getContents(string $uri): string
    {
        $client = new Client([
            'base_uri' => self::BASE_URI,
            'timeout' => self::REQUEST_TIMEOUT,
        ]);

        return $client->request('GET', $uri)->getBody()->getContents();
    }
}