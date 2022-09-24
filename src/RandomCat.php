<?php

namespace App;

use GuzzleHttp\Exception\GuzzleException;

class RandomCat extends Cat
{
    protected string $uri = '/v1/images/search';

    /**
     * @throws GuzzleException
     */
    public function getCat(): string
    {
        return getContents($this->uri);
    }
}
