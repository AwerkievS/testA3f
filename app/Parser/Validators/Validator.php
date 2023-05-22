<?php

namespace App\Parser\Validators;

use App\Parser\DTO\ParserRequestDTO;

interface Validator
{

    public function validate(ParserRequestDTO $request): bool;

}