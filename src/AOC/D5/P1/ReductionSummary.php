<?php

namespace AOC\D5\P1;

use AOC\D5\P1\ReductionStep\AbstractReductionStep;

/**
 * Class ReductionSummary
 *
 * @package AOC\D5\P1
 */
class ReductionSummary
{
    /** @var AbstractReductionStep[] */
    private array $steps = [];

    /** @var int|null */
    private ?int $result;

    /**
     * @return AbstractReductionStep[]
     */
    public function getSteps(): array
    {
        return $this->steps;
    }

    /**
     * @param AbstractReductionStep[] $steps
     */
    public function setSteps(array $steps): void
    {
        $this->steps = $steps;
    }

    /**
     * @param AbstractReductionStep $step
     *
     * @return $this
     */
    public function addStep(AbstractReductionStep $step): self
    {
        $this->steps[] = $step;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getResult(): ?int
    {
        return $this->result;
    }

    /**
     * @param int $result
     *
     * @return ReductionSummary
     */
    public function setResult(int $result): ReductionSummary
    {
        $this->result = $result;

        return $this;
    }

    /**
     * @return string
     */
    public function getTextualSummary(): string
    {
        $descriptions = array_map(fn (AbstractReductionStep $step) => $step->getDescription(), $this->steps);

        return implode(PHP_EOL, $descriptions);
    }
}
