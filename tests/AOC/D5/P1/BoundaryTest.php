<?php

use AOC\D5\P1\Boundary;
use PHPUnit\Framework\TestCase;

/**
 * Class BoundaryTest
 *
 * bin/phpunit --filter BoundaryTest
 */
class BoundaryTest extends TestCase
{
    /**
     * bin/phpunit --filter BoundaryTest::testGetMin
     */
    public function testGetMin()
    {
        $boundary = new Boundary(0, 127);

        $this->assertEquals(0, $boundary->getMin());
    }

    /**
     * bin/phpunit --filter BoundaryTest::testGetMax
     */
    public function testGetMax()
    {
        $boundary = new Boundary(0, 127);

        $this->assertEquals(127, $boundary->getMax());
    }

    /**
     * bin/phpunit --filter BoundaryTest::testGetMidPoint
     */
    public function testGetMidPoint()
    {
        $boundary = new Boundary(0, 127);

        $this->assertEquals(63, $boundary->getMidPoint());
    }
}