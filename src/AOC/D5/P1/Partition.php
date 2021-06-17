<?php

namespace AOC\D5\P1;

/**
 * Class Partition
 *
 * @package AOC\D5\P1
 */
class Partition
{
    /** @var BoundaryInstructionSet */
    private BoundaryInstructionSet $rowInstructions;

    private array $rowInstructionMap = [
        'F' => BoundaryInstructionSet::LOWER,
        'B' => BoundaryInstructionSet::UPPER,
    ];

    /** @var BoundaryInstructionSet */
    private BoundaryInstructionSet $columnInstructions;

    private array $columnInstructionMap = [
        'R' => BoundaryInstructionSet::UPPER,
        'L' => BoundaryInstructionSet::LOWER,
    ];

    /**
     * Partition constructor.
     *
     * @param string $partitionString
     */
    public function __construct(string $partitionString)
    {
        $partitionString = str_split($partitionString);

        $this->rowInstructions = new BoundaryInstructionSet(
            $this->mapInstructions(
                array_slice($partitionString, 0, 7),
                $this->rowInstructionMap
            ),
            array_flip($this->rowInstructionMap)
        );

        $this->columnInstructions = new BoundaryInstructionSet(
            $this->mapInstructions(
                array_slice($partitionString, 7, 3),
                $this->columnInstructionMap
            ),
            array_flip($this->columnInstructionMap)
        );
    }

    public function getRowInstructions(): BoundaryInstructionSet
    {
        return $this->rowInstructions;
    }

    public function getColumnInstructions(): BoundaryInstructionSet
    {
        return $this->columnInstructions;
    }

    private function mapInstructions(array $instructions, array $map): array
    {
        return array_map(
            function (string $instruction) use ($map) {
                $mapped = $map[$instruction] ?? null;
                if (!$mapped) {
                    throw new \Exception('Missing map');
                }

                return $mapped;
            },
            $instructions
        );
    }
}