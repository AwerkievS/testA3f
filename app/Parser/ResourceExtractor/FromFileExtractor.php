<?php

namespace App\Parser\ResourceExtractor;

use App\Parser\DTO\ParserResourceDTO;

class FromFileExtractor implements ExtractorParserResource
{
    public function getParserResource(string $from): ParserResourceDTO
    {
        return new ParserResourceDTO('empty', 'empty'); // TODO: Implement getParserResource() method.
    }
}