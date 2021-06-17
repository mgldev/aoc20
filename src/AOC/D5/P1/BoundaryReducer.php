<?php

namespace AOC\D5\P1;

use AOC\D5\P1\ReductionStep\FinalReductionStep;
use AOC\D5\P1\ReductionStep\InitialReductionStep;
use AOC\D5\P1\ReductionStep\ReductionStep;
use Exception;

/**
 * Class BoundaryReducer
 *
 * @package AOC\D5\P1
 */
class BoundaryReducer
{
    /**
     * @param Boundary $startingBoundary
     * @param BoundaryInstructionSet $instructions
     *
     * @return ReductionSummary
     *
     * @throws Exception
     */
    public function reduce(Boundary $startingBoundary, BoundaryInstructionSet $instructions): ReductionSummary
    {
        $summary = new ReductionSummary();

        $range = BoundaryRange::fromBoundary($startingBoundary);
        $summary->addStep(new InitialReductionStep($startingBoundary));

        foreach ($instructions as $instruction) {
            switch ($instruction) {
                case BoundaryInstructionSet::UPPER:
                    $boundary = $range->getUpper();
                    break;
                case BoundaryInstructionSet::LOWER:
                    $boundary = $range->getLower();
                    break;

                default:
                    throw new Exception('Unrecognised row boundary instruction');
            }

            if ($boundary->getMin() === $boundary->getMax()) {
                $summary->setResult($boundary->getMin());

                $summary->addStep(
                    new FinalReductionStep(
                        $boundary,
                        $instructions->getOriginalInstruction($instruction),
                        $instruction
                    )
                );

                return $summary;
            }

            $summary->addStep(
                new ReductionStep(
                    $boundary,
                    $instructions->getOriginalInstruction($instruction),
                    $instruction
                )
            );

            $range = BoundaryRange::fromBoundary($boundary);
        }

        return $summary;
    }
}
