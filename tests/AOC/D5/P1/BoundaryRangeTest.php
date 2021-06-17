<?php

use AOC\D5\P1\Boundary;
use AOC\D5\P1\BoundaryRange;
use PHPUnit\Framework\TestCase;

/**
 * Class BoundaryTest
 *
 * bin/phpunit --filter BoundaryTest
 */
class BoundaryRangeTest extends TestCase
{
    /**
     * bin/phpunit --filter BoundaryRangeTest::testGetLowerRange
     */
    public function testGetLowerRange()
    {
        $range = new BoundaryRange(new Boundary(0, 63), new Boundary(64, 127));

        $this->assertEquals(0, $range->getLower()->getMin());
        $this->assertEquals(63, $range->getLower()->getMax());
    }

    /**
     * bin/phpunit --filter BoundaryRangeTest::testGetUpperRange
     */
    public function testGetUpperRange()
    {
        $range = new BoundaryRange(new Boundary(0, 63), new Boundary(64, 127));

        $this->assertEquals(64, $range->getUpper()->getMin());
        $this->assertEquals(127, $range->getUpper()->getMax());
    }

    /**
     * @return Generator
     */
    public static function getRangeFromBoundaryDataProvider(): Generator
    {
        yield 'testing row boundary range of plane (128 rows)' => [
            new Boundary(0, 127),
            [
                'lower' => [
                    'min' => 0,
                    'max' => 63
                ],
                'upper' => [
                    'min' => 64,
                    'max' => 127
                ]
            ]
        ];

        yield 'testing column boundary range of plane (8 seats)' => [
            new Boundary(0, 7),
            [
                'lower' => [
                    'min' => 0,
                    'max' => 3
                ],
                'upper' => [
                    'min' => 4,
                    'max' => 7
                ]
            ]
        ];
    }

    /**
     * bin/phpunit --filter BoundaryRangeTest::testGetRangeFromBoundary
     *
     * @dataProvider getRangeFromBoundaryDataProvider
     *
     * @param Boundary $boundary
     * @param array $expectedRange
     */
    public function testGetRangeFromBoundary(Boundary $boundary, array $expectedRange)
    {
        $range = BoundaryRange::fromBoundary($boundary);

        $this->assertEquals($expectedRange, $range->toArray());
    }
}