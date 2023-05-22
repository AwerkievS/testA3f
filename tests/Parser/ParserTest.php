<?php

namespace Parser;

use App\Parser\DTO\ParseResultDTO;
use App\Parser\DTO\ParserResourceDTO;
use App\Parser\HtmlTagsParser;
use PHPUnit\Framework\TestCase;

class ParserTest extends TestCase
{
    private HtmlTagsParser $tagParser;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->tagParser = new HtmlTagsParser();
    }

    /**
     * @return void
     */
    public function testHtmlParserResultObject(): void
    {
        $parseResult = $this->tagParser->parse(new ParserResourceDTO('test', 'test'));
        $this->assertInstanceOf(ParseResultDTO::class, $parseResult);
    }

    /**
     * @dataProvider htmlResourceProvider
     * @param $source
     * @param $expect
     * @return void
     */
    public function testHtmlParse($source, $expect): void
    {
        $parser = new HtmlTagsParser();
        $parseResult = $parser->parse(new ParserResourceDTO('test', $source));
        $this->assertEquals($expect, $parseResult->getResults());
    }

    /**
     * @return array[]
     */
    public function htmlResourceProvider(): array
    {
        return [
            [
                'source' => '',
                'expect' => [],
            ],
            [
                'source' => '<p>test string </p>>',
                'expect' => ['p' => 1],
            ],
            [
                'source' => '<p>test > string </p> <img src="ParserTest.php" alt="test">',
                'expect' => ['p' => 1, 'img' => 1],
            ],
            [
                'source' => '<p>test > string </p> <p> 2 p </p>',
                'expect' => ['p' => 2],
            ]
        ];
    }

}
