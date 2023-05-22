<?php

namespace App\Parser\Validators;

use App\Parser\DTO\ParserRequestDTO;
use App\Parser\Validators\Rules\EmptyExtractFrom;
use App\Parser\Validators\Rules\FromValidUrl;
use Exception;

class UrlResourceValidator implements Validator
{
    /**
     * @param ParserRequestDTO $request
     * @return bool
     * @throws Exception
     */
    public function validate(ParserRequestDTO $request): bool
    {
        $validUrlRule = new FromValidUrl();
        $emptyUrlRule = new EmptyExtractFrom();

        $emptyUrlRule->setNextRule($validUrlRule);

        $emptyUrlRule->checkParserRequest($request);

        return true;
    }

}