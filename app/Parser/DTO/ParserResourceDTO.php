<?php

namespace App\Parser\DTO;

class ParserResourceDTO
{
    public function __construct(private string $resource, private string $source)
    {
    }

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @return string
     */
    public function getResource(): string
    {
        return $this->resource;
    }

}