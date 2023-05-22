<?php

namespace App\Parser;

use App\Parser\DTO\ParseResultDTO;
use App\Parser\DTO\ParserResourceDTO;

interface Parser
{
    public function parse(ParserResourceDTO $parseResource): ParseResultDTO;

}