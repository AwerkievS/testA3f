<?php

namespace App\Parser\View;

use App\Parser\DTO\HtmlViewParseDTO;
use App\Parser\DTO\ParseResultDTO;

class HtmlParseResultView
{
    private const SEPARATOR = ', ';

    public function prepareHtmlParseResultView(ParseResultDTO $parseResultDTO): HtmlViewParseDTO
    {
        return new HtmlViewParseDTO(
            $this->concatResource($parseResultDTO->getResource()),
            $parseResultDTO->getResults()
        );
    }

    private function concatResource(string|array $resource): string
    {
        if (is_array($resource)) {
            return implode(self::SEPARATOR, $resource);
        }
        return $resource;
    }

}