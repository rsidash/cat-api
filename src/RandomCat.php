<?php

namespace App;

use GuzzleHttp\Exception\GuzzleException;

class RandomCat extends Cat
{
    /**
     * @throws GuzzleException
     */
    public function getCat(): string
    {
        $uri = '/v1/images/search';

        return getContents($uri);
    }
}
