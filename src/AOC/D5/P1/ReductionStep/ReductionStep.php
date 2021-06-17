<?php


namespace AOC\D5\P1\ReductionStep;

use AOC\D5\P1\Boundary;
use AOC\D5\P1\BoundaryInstructionSet;

/**
 * Class ReductionStep
 *
 * @package AOC\D5\P1\ReductionStep
 */
class ReductionStep extends AbstractReductionStep
{
    /** @var string */
    private string $originalInstruction;

    /** @var string */
    private string $mappedInstruction;

    /**
     * ReductionStep constructor.
     *
     * @param Boundary $boundary
     * @param string $originalInstruction
     * @param string $mappedInstruction
     */
    public function __construct(Boundary $boundary, string $originalInstruction, string $mappedInstruction)
    {
        parent::__construct($boundary);

        $this->originalInstruction = $originalInstruction;
        $this->mappedInstruction = $mappedInstruction;
    }

    public function getOriginalInstruction(): string
    {
        return $this->originalInstruction;
    }

    public function getMappedInstruction(): string
    {
        return $this->mappedInstruction;
    }
    /**
     * @return string
     */
    public function getDescription(): string
    {
        $region = $this->getMappedInstruction() === BoundaryInstructionSet::UPPER ? 'upper half' : 'lower half';
        $template = '%s means to take the %s, keeping indexes %s through %s';

        return sprintf(
            $template,
            $this->getOriginalInstruction(),
            $region,
            $this->boundary->getMin(),
            $this->boundary->getMax()
        );
    }
}
