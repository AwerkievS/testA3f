<?php

namespace App;

use App\Parser\DTO\ParseResultDTO;
use App\Parser\DTO\ParserRequestDTO;
use App\Parser\Parser;
use App\Parser\ResourceExtractor\ResourceExtractor;
use App\Parser\Validators\Validator;

class ParseHandler
{
    private ResourceExtractor $extractor;
    private Validator $validator;
    private Parser $parser;

    /**
     * @param ResourceExtractor $extractor
     * @param Validator $validator
     * @param Parser $parser
     */
    public function __construct(ResourceExtractor $extractor, Validator $validator, Parser $parser)
    {
        $this->parser = $parser;
        $this->validator = $validator;
        $this->extractor = $extractor;
    }

    /**
     * @param ParserRequestDTO $requestDTO
     * @return ParseResultDTO
     */
    public function exec(ParserRequestDTO $requestDTO): ParseResultDTO
    {
        $this->validator->validate($requestDTO);
        $resource = $this->extractor->getParserResource($requestDTO->getExtractFrom());
        return $this->parser->parse($resource);

    }

    /**
     * @param ResourceExtractor $extractor
     */
    public function setExtractor(ResourceExtractor $extractor): void
    {
        $this->extractor = $extractor;
    }

    /**
     * @param Validator $validator
     */
    public function setValidator(Validator $validator): void
    {
        $this->validator = $validator;
    }

    /**
     * @param Parser $parser
     */
    public function setParser(Parser $parser): void
    {
        $this->parser = $parser;
    }

}