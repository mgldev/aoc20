<?php

namespace AOC\D8\P1;

use RuntimeException;

/**
 * Class InfiniteLoopException
 *
 * @package AOC\D8\P1
 */
class InfiniteLoopException extends RuntimeException
{
    /** @var int */
    private int $accumulatorValue;

    /** @var int */
    private int $problemInstructionPosition;

    /**
     * InfiniteLoopException constructor.
     *
     * @param int $accumulatorValue
     * @param int $problemInstructionPosition
     */
    public function __construct(int $accumulatorValue, int $problemInstructionPosition)
    {
        parent::__construct('Infinite program detected');

        $this->accumulatorValue = $accumulatorValue;
        $this->problemInstructionPosition = $problemInstructionPosition;
    }

    /**
     * @return int
     */
    public function getAccumulatorValue(): int
    {
        return $this->accumulatorValue;
    }

    /**
     * @return int
     */
    public function getProblemInstructionPosition(): int
    {
        return $this->problemInstructionPosition;
    }
}
