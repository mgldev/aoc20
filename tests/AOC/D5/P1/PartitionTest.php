<?php

use AOC\D5\P1\Boundary;
use AOC\D5\P1\BoundaryInstructionSet;
use AOC\D5\P1\Partition;
use PHPUnit\Framework\TestCase;

/**
 * Class PartitionTest
 *
 * bin/phpunit --filter PartitionTest
 */
class PartitionTest extends TestCase
{
    /** @var Partition */
    private Partition $partition;

    /**
     * Set up
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->partition = new Partition('FBFBBFFRLR');
    }

    /**
     * bin/phpunit --filter PartitionTest::testPartitionExtractsCorrectRows
     */
    public function testPartitionExtractsCorrectRows()
    {
        $rowInstructions = $this->partition->getRowInstructions();

        $expectedInstructions = [
            BoundaryInstructionSet::LOWER,
            BoundaryInstructionSet::UPPER,
            BoundaryInstructionSet::LOWER,
            BoundaryInstructionSet::UPPER,
            BoundaryInstructionSet::UPPER,
            BoundaryInstructionSet::LOWER,
            BoundaryInstructionSet::LOWER
        ];

        $this->assertEquals($expectedInstructions, $rowInstructions->getInstructions());
    }

    /**
     * bin/phpunit --filter PartitionTest::testPartitionExtractsCorrectColumns
     */
    public function testPartitionExtractsCorrectColumns()
    {
        $columnInstructions = $this->partition->getColumnInstructions();

        $expectedInstructions = [
            BoundaryInstructionSet::UPPER,
            BoundaryInstructionSet::LOWER,
            BoundaryInstructionSet::UPPER
        ];

        $this->assertEquals($expectedInstructions, $columnInstructions->getInstructions());
    }

    /**
     * bin/phpunit --filter PartitionTest::testInstructionMapForRows
     */
    public function testInstructionMapForRows()
    {
        $this->assertEquals(
            [
                BoundaryInstructionSet::LOWER => 'F',
                BoundaryInstructionSet::UPPER => 'B',
            ],
            $this->partition->getRowInstructions()->getInstructionMap()
        );
    }

    /**
     * bin/phpunit --filter PartitionTest::testInstructionMapForColumns
     */
    public function testInstructionMapForColumns()
    {
        $this->assertEquals(
            [
                BoundaryInstructionSet::LOWER => 'L',
                BoundaryInstructionSet::UPPER => 'R',
            ],
            $this->partition->getColumnInstructions()->getInstructionMap()
        );
    }

    /**
     * bin/phpunit --filter PartitionTest::testGetOriginalInstructionForRowInstruction
     */
    public function testGetOriginalInstructionForRowInstruction()
    {
        $this->assertEquals(
            'F',
            $this->partition->getRowInstructions()->getOriginalInstruction(BoundaryInstructionSet::LOWER)
        );

        $this->assertEquals(
            'B',
            $this->partition->getRowInstructions()->getOriginalInstruction(BoundaryInstructionSet::UPPER)
        );
    }

    /**
     * bin/phpunit --filter PartitionTest::testGetOriginalInstructionForColumnInstruction
     */
    public function testGetOriginalInstructionForColumnInstruction()
    {
        $this->assertEquals(
            'L',
            $this->partition->getColumnInstructions()->getOriginalInstruction(BoundaryInstructionSet::LOWER)
        );

        $this->assertEquals(
            'R',
            $this->partition->getColumnInstructions()->getOriginalInstruction(BoundaryInstructionSet::UPPER)
        );
    }
}