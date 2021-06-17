<?php

namespace AOC\D5\P1;

use Exception;

/**
 * Class SeatResolver
 *
 * @package AOC\D5\P1
 */
class SeatResolver
{
    /** @var BoundaryReducer */
    private BoundaryReducer $boundaryReducer;

    /**
     * SeatResolver constructor.
     *
     * @param BoundaryReducer $boundaryReducer
     */
    public function __construct(BoundaryReducer $boundaryReducer)
    {
        $this->boundaryReducer = $boundaryReducer;
    }

    /**
     * @param Partition $partition
     *
     * @return Seat
     *
     * @throws Exception
     */
    public function resolve(Partition $partition): Seat
    {
        return new Seat($this->resolveRow($partition), $this->resolveColumn($partition));
    }

    /**
     * @param Partition $partition
     *
     * @return int|null
     *
     * @throws Exception
     */
    private function resolveRow(Partition $partition): ?int
    {
        $summary = $this->boundaryReducer->reduce(
            new Boundary(0, 127),
            $partition->getRowInstructions()
        );

        return $summary->getResult();
    }

    /**
     * @param Partition $partition
     *
     * @return int
     *
     * @throws Exception
     */
    private function resolveColumn(Partition $partition): int
    {
        $summary = $this->boundaryReducer->reduce(
            new Boundary(0, 7),
            $partition->getColumnInstructions()
        );

        return $summary->getResult();
    }
}
