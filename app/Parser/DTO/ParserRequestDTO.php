<?php

namespace App\Parser\DTO;

class ParserRequestDTO
{
    /**
     * @param string $extractFrom
     */
    public function __construct(private string $extractFrom){}

    /**
     * @return string
     */
    public function getExtractFrom(): string
    {
        return $this->extractFrom;
    }

}