<?php

namespace App\Parser\Validators\Rules;


use App\Parser\DTO\ParserRequestDTO;
use App\Parser\Exceptions\Rule\IsFromValidUrlException;

class FromValidUrl extends Rule
{

    /**
     * @param ParserRequestDTO $parserRequest
     * @return void
     * @throws IsFromValidUrlException
     */
    public function checkParserRequest(ParserRequestDTO $parserRequest): void
    {
        $urlFrom = $parserRequest->getExtractFrom();
        $isValid = filter_var($urlFrom, FILTER_VALIDATE_URL);
        if ($isValid) {
            $this->checkNextRule($parserRequest);
        } else {
            throw new IsFromValidUrlException();
        }
    }
}