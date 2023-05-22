<?php

namespace App\Parser\Validators\Rules;

use App\Parser\DTO\ParserRequestDTO;
use App\Parser\Exceptions\Rule\EmptyExtractFromException;
use Exception;

class EmptyExtractFrom extends Rule
{

    /**
     * @param ParserRequestDTO $parserRequest
     * @return void
     * @throws EmptyExtractFromException
     */
    public function checkParserRequest(ParserRequestDTO $parserRequest): void
    {
        $extractFrom = trim($parserRequest->getExtractFrom());
        if (empty($extractFrom)) {
            throw new EmptyExtractFromException();
        }
        $this->checkNextRule($parserRequest);
    }
}