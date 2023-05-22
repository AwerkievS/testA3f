<?php

namespace App\Parser\Services;

use App\Parser\DTO\ParseResultDTO;

class MergeParseResultService
{
    /**
     * @param ParseResultDTO $leftParseResult
     * @param ParseResultDTO $rightResult
     * @return ParseResultDTO
     */
    public function mergeParseResults(ParseResultDTO $leftParseResult, ParseResultDTO $rightResult): ParseResultDTO
    {
        $mergedResult = [];

        foreach ($leftParseResult->getResults() as $tag => $count) {
            if (isset($mergedResult[$tag])) {
                $mergedResult[$tag] += $count;
            } else {
                $mergedResult[$tag] = $count;
            }
        }

        foreach ($rightResult->getResults() as $tag => $count) {
            if (isset($mergedResult[$tag])) {
                $mergedResult[$tag] += $count;
            } else {
                $mergedResult[$tag] = $count;
            }
        }

        return new ParseResultDTO(
            $this->mergeResources($leftParseResult->getResource(), $rightResult->getResource()),
            $mergedResult
        );
    }

    /**
     * @param string|array $leftResource
     * @param string|array $rightResource
     * @return array
     */
    private function mergeResources(string|array $leftResource, string|array $rightResource): array
    {
        $result = [];
        if (is_array($leftResource)) {
            $result = $leftResource;
        } else {
            $result[] = $leftResource;
        }
        if (is_array($rightResource)) {
            $result = array_merge($result, $rightResource);
        } else {
            $result[] = $rightResource;
        }

        return $result;
    }

}