<?php

namespace AOC\D8\P1;

/**
 * Class Console
 *
 * @package AOC\D8\P1
 */
class Console
{
    /** @var int */
    private int $accumulator = 0;

    /** @var int */
    private int $position = 0;

    /** @var int[] */
    private array $executedInstructions = [];

    /**
     * @param Program $program
     *
     * @return int
     *
     * @throws InfiniteLoopException
     */
    public function execute(Program $program): int
    {
        $this->accumulator = 0;
        $this->position = 0;
        $this->executedInstructions = [];

        while (!in_array($this->position, $this->executedInstructions)) {
            $instruction = $program->getInstruction($this->position);

            if ($instruction === null) {
                return $this->accumulator;
            }

            $this->executedInstructions[] = $this->position;

            switch ($instruction->getCommand()) {
                case 'nop':
                    $this->incrementPosition();
                    break;

                case 'acc':
                    $this->modifyProperty('accumulator', $instruction);
                    $this->incrementPosition();
                    break;

                case 'jmp':
                    $this->modifyProperty('position', $instruction);
                    break;
            }
        }

        throw new InfiniteLoopException($this->accumulator, end($this->executedInstructions));
    }

    /**
     * Increment position
     */
    private function incrementPosition(): void
    {
        $this->position++;
    }

    /**
     * Modify the specified property as per the provided instruction's parameters
     *
     * @param string $propertyName
     * @param Instruction $instruction
     */
    private function modifyProperty(string $propertyName, Instruction $instruction): void
    {
        $value = $instruction->getValue();
        $instruction->getOperand() === '+' ? ($this->{$propertyName} += $value) : ($this->{$propertyName} -= $value);
    }
}
