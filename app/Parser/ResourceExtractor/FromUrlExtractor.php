<?php

namespace App\Parser\ResourceExtractor;

use App\Parser\DTO\ParserResourceDTO;

class FromUrlExtractor implements ExtractorParserResource
{
    public function getParserResource(string $from): ParserResourceDTO
    {
        $ch = curl_init($from);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);

        curl_close($ch);

        return new ParserResourceDTO($from, $result);
    }
}