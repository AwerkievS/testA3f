<?php

namespace Parser\Validators\Rules;

use App\Parser\DTO\ParserRequestDTO;
use App\Parser\Exceptions\Rule\EmptyExtractFromException;
use App\Parser\Validators\Rules\EmptyExtractFrom;
use Exception;
use PHPUnit\Framework\TestCase;

class EmptyExtractFromTest extends TestCase
{
    private EmptyExtractFrom $rule;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->rule = new EmptyExtractFrom();
    }

    /**
     * @return void
     * @throws Exception
     */
    public function testEmptyExtractFrom(): void
    {
        $this->expectException(EmptyExtractFromException::class);
        $this->rule->checkParserRequest(new ParserRequestDTO(''));
    }
    /**
     * @return void
     * @throws Exception
     */
    public function testTrimExtractFrom(): void
    {
        $this->expectException(EmptyExtractFromException::class);
        $this->rule->checkParserRequest(new ParserRequestDTO(' '));
    }
}
