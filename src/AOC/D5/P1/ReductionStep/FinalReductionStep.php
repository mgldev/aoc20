<?php

namespace AOC\D5\P1\ReductionStep;

/**
 * Class FinalReductionStep
 *
 * @package AOC\D5\P1\ReductionStep
 */
class FinalReductionStep extends ReductionStep
{
    public function getDescription(): string
    {
        return sprintf(
            'The final %s keeps the %s of the two, index %s',
            $this->getOriginalInstruction(),
            $this->getMappedInstruction() === 'L' ? 'lower' : 'upper',
            $this->boundary->getMin()
        );
    }
}
