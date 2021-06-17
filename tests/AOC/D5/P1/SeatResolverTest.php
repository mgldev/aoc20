<?php

use AOC\D5\P1\BoundaryReducer;
use AOC\D5\P1\Partition;
use AOC\D5\P1\SeatResolver;
use PHPUnit\Framework\TestCase;

/**
 * Class SeatResolverTest
 *
 * bin/phpunit --filter SeatResolverTest
 */
class SeatResolverTest extends TestCase
{
    /** @var SeatResolver */
    private SeatResolver $seatResolver;

    /**
     * Set up
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->seatResolver = new SeatResolver(new BoundaryReducer());
    }

    /**
     * @return Generator
     */
    public static function resolveSeatDataProvider(): Generator
    {
        yield 'main AOC example boarding pass' => [
            'FBFBBFFRLR',
            44,
            5,
            357
        ];

        yield 'additional boarding pass #1' => [
            'BFFFBBFRRR',
            70,
            7,
            567
        ];

        yield 'additional boarding pass #2' => [
            'FFFBBBFRRR',
            14,
            7,
            119
        ];

        yield 'additional boarding pass #3' => [
            'BBFFBBFRLL',
            102,
            4,
            820
        ];
    }

    /**
     * bin/phpunit --filter SeatResolverTest::testResolve
     *
     * @dataProvider resolveSeatDataProvider
     *
     * @param string $partitionString
     * @param int $expectedRow
     * @param int $expectedColumn
     * @param int $expectedSeatID
     */
    public function testResolve(string $partitionString, int $expectedRow, int $expectedColumn, int $expectedSeatID)
    {
        $seat = $this->seatResolver->resolve(new Partition($partitionString));

        $this->assertEquals($expectedRow, $seat->getRow());
        $this->assertEquals($expectedColumn, $seat->getColumn());
        $this->assertEquals($expectedSeatID, $seat->getId());
    }
}