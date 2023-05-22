<?php

namespace App\Parser\ResourceExtractor;

use App\Parser\DTO\ParserResourceDTO;

interface ExtractorParserResource
{
    public function getParserResource(string $from):ParserResourceDTO;
}