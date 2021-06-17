<?php

namespace AOC\D5\P1;

use ArrayIterator;
use Countable;
use IteratorAggregate;

/**
 * Class BoundaryInstructionSet
 */
class BoundaryInstructionSet implements IteratorAggregate, Countable
{
    /** @var string */
    public const UPPER = 'U';

    /** @var string */
    public const LOWER = 'L';

    /** @var string[] */
    private array $instructions;

    /** @var array */
    private array $instructionMap;

    /**
     * BoundaryInstructionSet constructor.
     *
     * @param string[] $instructions
     * @param array $instructionMap
     */
    public function __construct(array $instructions, array $instructionMap = [])
    {
        $this->instructionMap = $instructionMap;

        foreach ($instructions as $instruction) {
            $this->addInstruction($instruction);
        }
    }

    /**
     * @param $instruction
     *
     * @return bool
     */
    private function isValidInstruction($instruction): bool
    {
        $validInstructions = [self::UPPER, self::LOWER];

        return is_string($instruction) && in_array($instruction, $validInstructions);
    }

    /**
     * @param string $instruction
     *
     * @return $this
     */
    public function addInstruction(string $instruction): self
    {
        if (!$this->isValidInstruction($instruction)) {
            throw new \InvalidArgumentException('Invalid instruction');
        }

        $this->instructions[] = $instruction;

        return $this;
    }

    /**
     * @param string $instruction
     *
     * @return string|null
     */
    public function getOriginalInstruction(string $instruction): ?string
    {
        return $this->instructionMap[$instruction] ?? null;
    }

    /**
     * @return string[]
     */
    public function getInstructions(): array
    {
        return $this->instructions;
    }

    /**
     * @return array
     */
    public function getInstructionMap(): array
    {
        return $this->instructionMap;
    }

    /**
     * @inheritDoc
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->instructions);
    }

    /**
     * @inheritDoc
     */
    public function count()
    {
        return count($this->instructions);
    }
}
