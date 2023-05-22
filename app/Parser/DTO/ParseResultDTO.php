<?php

namespace App\Parser\DTO;

class ParseResultDTO
{

    private string|array $resource;
    private array $results;

    /**
     * @param string|array $resource
     * @param array $results
     */
    public function __construct(string|array $resource, array $results)
    {

        $this->resource = $resource;
        $this->results = $results;
    }

    /**
     * @return array|string
     */
    public function getResource(): array|string
    {
        return $this->resource;
    }

    /**
     * @return array
     */
    public function getResults(): array
    {
        return $this->results;
    }

}