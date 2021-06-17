<?php

use AOC\D5\P1\Boundary;
use AOC\D5\P1\BoundaryInstructionSet;
use AOC\D5\P1\BoundaryReducer;
use PHPUnit\Framework\TestCase;

/**
 * Class BoundaryReducerTest
 *
 * bin/phpunit --filter BoundaryReducerTest
 */
class BoundaryReducerTest extends TestCase
{
    /** @var BoundaryReducer */
    private BoundaryReducer $reducer;

    /**
     * Set up
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->reducer = new BoundaryReducer();
    }

    /**
     * bin/phpunit --filter BoundaryReducerTest::testReduceRowsProducesExpectedResult
     */
    public function testReduceRowsProducesExpectedResult()
    {
        $startingBoundary = new Boundary(0, 127);

        $instructions = [
            BoundaryInstructionSet::LOWER,
            BoundaryInstructionSet::UPPER,
            BoundaryInstructionSet::LOWER,
            BoundaryInstructionSet::UPPER,
            BoundaryInstructionSet::UPPER,
            BoundaryInstructionSet::LOWER,
            BoundaryInstructionSet::LOWER
        ];

        $map = [
            BoundaryInstructionSet::LOWER => 'F',
            BoundaryInstructionSet::UPPER => 'B'
        ];

        $instructionSet = new BoundaryInstructionSet($instructions, $map);

        $summary = $this->reducer->reduce($startingBoundary, $instructionSet);
        $expectedTextualSummary = file_get_contents(__DIR__ . '/fixtures/expected-row-reduction-summary.txt');

        $this->assertEquals($expectedTextualSummary, $summary->getTextualSummary());
        $this->assertEquals(44, $summary->getResult());
    }

    /**
     * bin/phpunit --filter BoundaryReducerTest::testReduceColumnsProducesExpectedResult
     */
    public function testReduceColumnsProducesExpectedResult()
    {
        $startingBoundary = new Boundary(0, 7);

        $instructions = [
            BoundaryInstructionSet::UPPER,
            BoundaryInstructionSet::LOWER,
            BoundaryInstructionSet::UPPER,
        ];

        $map = [
            BoundaryInstructionSet::LOWER => 'L',
            BoundaryInstructionSet::UPPER => 'R'
        ];

        $instructionSet = new BoundaryInstructionSet($instructions, $map);

        $summary = $this->reducer->reduce($startingBoundary, $instructionSet);
        $expectedTextualSummary = file_get_contents(__DIR__ . '/fixtures/expected-column-reduction-summary.txt');

        $this->assertEquals($expectedTextualSummary, $summary->getTextualSummary());
        $this->assertEquals(5, $summary->getResult());
    }
}
