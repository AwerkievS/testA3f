<?php

namespace App\Parser\ResourceExtractor;

use App\Parser\DTO\ParserResourceDTO;

class ResourceExtractor
{
    private ExtractorParserResource $extractor;

    /**
     * @param ExtractorParserResource $extractor
     * @return void
     */
    public function setExtractor(ExtractorParserResource $extractor): void
    {
        $this->extractor = $extractor;
    }

    /**
     * @param string $from
     * @return ParserResourceDTO
     */
    public function getParserResource(string $from): ParserResourceDTO
    {
        return $this->extractor->getParserResource($from);
    }
}
