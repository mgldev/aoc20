<?php

namespace AOC\D5\P1\ReductionStep;

/**
 * Class InitialReductionStep
 *
 * @package AOC\D5\P1\ReductionStep
 */
class InitialReductionStep extends AbstractReductionStep
{
    public function getDescription(): string
    {
        return sprintf(
            'Start by considering the whole range, indexes %s through %s',
            $this->boundary->getMin(),
            $this->boundary->getMax()
        );
    }
}
