<?php

namespace App\Parser\Services;

use App\Parser\DTO\ParseResultDTO;

class FilterParsedTagsService
{
    public function filterTags(array $tags, ParseResultDTO $data): ParseResultDTO
    {
        if (empty($tags)) {
            return $data;
        }
        $result = array_filter($data->getResults(), function ($tag) use ($tags) {
            return in_array($tag, $tags);
        }, ARRAY_FILTER_USE_KEY);
        return new ParseResultDTO($data->getResource(), $result);
    }

}