<?php

use AOC\D5\P1\Seat;
use PHPUnit\Framework\TestCase;

/**
 * Class SeatTest
 *
 * bin/phpunit --filter SeatTest
 */
class SeatTest extends TestCase
{
    /** @var Seat */
    private Seat $seat;

    /**
     * Set up
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->seat = new Seat(44, 5);
    }

    /**
     * bin/phpunit --filter SeatTest::testGetRow
     */
    public function testGetRow()
    {
        $this->assertEquals(44, $this->seat->getRow());
    }

    /**
     * bin/phpunit --filter SeatTest::testGetRow
     */
    public function testGetColumn()
    {
        $this->assertEquals(5, $this->seat->getColumn());
    }

    /**
     * bin/phpunit --filter SeatTest::testGetId
     */
    public function testGetId()
    {
        $this->assertEquals(357, $this->seat->getId());
    }
}