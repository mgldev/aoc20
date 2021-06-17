<?php

namespace AOC\D5\P1\ReductionStep;

use AOC\D5\P1\Boundary;

/**
 * Class AbstractReductionStep
 *
 * @package AOC\D5\P1\ReductionStep
 */
abstract class AbstractReductionStep
{
    /** @var Boundary */
    protected Boundary $boundary;

    /**
     * AbstractReductionStep constructor.
     *
     * @param Boundary $boundary
     */
    public function __construct(Boundary $boundary)
    {
        $this->boundary = $boundary;
    }

    /**
     * @return string
     */
    abstract public function getDescription(): string;
}
