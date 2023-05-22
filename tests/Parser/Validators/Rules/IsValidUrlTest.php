<?php

namespace Parser\Validators\Rules;

use App\Parser\DTO\ParserRequestDTO;
use App\Parser\Exceptions\Rule\IsFromValidUrlException;
use App\Parser\Validators\Rules\FromValidUrl;
use PHPUnit\Framework\TestCase;

class IsValidUrlTest extends TestCase
{
    private FromValidUrl $rule;

    /**
     * @param string|null $name
     * @param array $data
     * @param $dataName
     */
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->rule = new FromValidUrl();
    }

    /**
     * @return void
     * @throws IsFromValidUrlException
     */
    public function testIsValidUrl(): void
    {
        $this->rule->checkParserRequest(new ParserRequestDTO('https://www.google.com/'));
        $this->expectNotToPerformAssertions();
    }

    /**
     * @return void
     * @throws IsFromValidUrlException
     */
    public function testNotValidUrl(): void
    {
        $this->expectException(IsFromValidUrlException::class);
        $this->rule->checkParserRequest(new ParserRequestDTO('testNotValid'));
    }

}
