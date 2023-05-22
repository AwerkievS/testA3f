<?php

namespace App\Parser\Validators\Rules;

use App\Parser\DTO\ParserRequestDTO;

abstract class Rule
{
    protected Rule $nextValidator;

    public abstract function checkParserRequest(ParserRequestDTO $parserRequest): void;

    public function setNextRule(Rule $nextRule): Rule
    {
        $this->nextValidator = $nextRule;
        return $nextRule;
    }

    protected function checkNextRule(ParserRequestDTO $parserRequest): void
    {
        if (isset($this->nextValidator)) {
            $this->nextValidator->checkParserRequest($parserRequest);
        }
    }

}
