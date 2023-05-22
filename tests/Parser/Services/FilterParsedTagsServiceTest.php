<?php

namespace Parser\Services;

use App\Parser\DTO\ParseResultDTO;
use App\Parser\Services\FilterParsedTagsService;
use PHPUnit\Framework\TestCase;

class FilterParsedTagsServiceTest extends TestCase
{
    private FilterParsedTagsService $filterService;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->filterService = new FilterParsedTagsService();
    }

    /**
     * @dataProvider filterDataProvider
     * @param array $source
     * @param array $filter
     * @param array $expect
     * @return void
     */
    public function testFilterParsedTags(array $source, array $filter, array $expect): void
    {
        $data = new ParseResultDTO('test', $source);
        $filteredTags =  $this->filterService->filterTags($filter, $data);
        $this->assertEquals($expect, $filteredTags->getResults());
    }

    /**
     * @return \array[][]
     */
    public function filterDataProvider(): array
    {
        return [
            [
                'source' => ['p' => 1, 'img' => 1],
                'filter' => [],
                'expect' =>  ['p' => 1, 'img' => 1],
            ],
            [
                'source' => ['p' => 1, 'img' => 1],
                'filter' => ['p'],
                'expect' =>  ['p' => 1],
            ]
        ];
    }

}
