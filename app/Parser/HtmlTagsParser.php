<?php

namespace App\Parser;

use App\Parser\DTO\ParseResultDTO;
use App\Parser\DTO\ParserResourceDTO;

class HtmlTagsParser implements Parser
{

    public function parse(ParserResourceDTO $parseResource): ParseResultDTO
    {
        $matches = [];
        $sourceString = $parseResource->getSource();
        preg_match_all('/<([a-z]+)[^>]*>/i', $sourceString, $matches);
        $tags = [];
        foreach ($matches[1] as $match) {
            if (isset($tags[$match])) {
                $tags[$match]++;
            } else {
                $tags[$match] = 1;
            }
        }

        return new ParseResultDTO($parseResource->getResource(), $tags);
    }

}