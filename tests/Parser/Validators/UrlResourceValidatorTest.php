<?php

namespace Parser\Validators;

use App\Parser\DTO\ParserRequestDTO;
use App\Parser\Validators\UrlResourceValidator;
use PHPUnit\Framework\TestCase;

class UrlResourceValidatorTest extends TestCase
{

    /**
     * @return void
     * @throws \Exception
     */
    public function testValidUrl(): void
    {
        $validator = new UrlResourceValidator();
        $isValid = $validator->validate(new ParserRequestDTO('https://www.google.com/'));
        $this->assertTrue($isValid);
    }

}
