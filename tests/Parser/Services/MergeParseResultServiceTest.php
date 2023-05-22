<?php

namespace Parser\Services;

use App\Parser\DTO\ParseResultDTO;
use App\Parser\Services\MergeParseResultService;
use PHPUnit\Framework\TestCase;

class MergeParseResultServiceTest extends TestCase
{
    private MergeParseResultService $mergeService;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->mergeService = new MergeParseResultService();
    }

    /**
     * @dataProvider mergeParseResultProvider
     * @param array $leftResult
     * @param array $rightResult
     * @param array $expected
     * @return void
     */
    public function testMergeParseResult(array $leftResult, array $rightResult, array $expected): void
    {
        $leftParseResult = new ParseResultDTO('test-left', $leftResult);
        $rightParseResult = new ParseResultDTO('test-right', $rightResult);
        $mergedResult = $this->mergeService->mergeParseResults($leftParseResult, $rightParseResult);
        $this->assertEquals($expected, $mergedResult->getResults());
    }

    /**
     * @dataProvider mergeResourceProvider
     * @param string|array $leftResource
     * @param string|array $rightResource
     * @param array $expect
     * @return void
     */
    public function testMergeParseResultResources(
        string|array $leftResource,
        string|array $rightResource,
        array        $expect
    ): void
    {
        $leftParseResult = new ParseResultDTO($leftResource, []);
        $rightParseResult = new ParseResultDTO($rightResource, []);
        $mergedResult = $this->mergeService->mergeParseResults($leftParseResult, $rightParseResult);
        $this->assertEquals($expect, $mergedResult->getResource());
    }


    /**
     * @return \int[][][]
     */
    public function mergeParseResultProvider(): array
    {
        return [
            [
                'leftResult' => ['p' => 1],
                'rightResult' => ['p' => 1],
                'expected' => ['p' => 2],
            ],
            [
                'leftResult' => ['p' => 1],
                'rightResult' => ['img' => 1],
                'expected' => ['p' => 1, 'img' => 1],
            ],
            [
                'leftResult' => [],
                'rightResult' => ['img' => 1],
                'expected' => ['img' => 1],
            ],
            [
                'leftResult' => [],
                'rightResult' => [],
                'expected' => [],
            ]
        ];
    }

    /**
     * @return array[]
     */
    public function mergeResourceProvider(): array
    {
        return [
            [
                'leftResource' => ['test-1', 'test-2'],
                'rightResource' => 'test-3',
                'expected' => ['test-1', 'test-2', 'test-3'],
            ],
            [
                'leftResource' => 'test-1',
                'rightResource' => ['test-2', 'test-3'],
                'expected' => ['test-1', 'test-2', 'test-3'],
            ],
            [
                'leftResource' => 'test-1',
                'rightResource' => 'test-2',
                'expected' => ['test-1', 'test-2',],
            ]
        ];
    }

}
