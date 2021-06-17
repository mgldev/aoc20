<?php

namespace AOC\D5\P1;

/**
 * Class BoundaryRange
 *
 * @package AOC\D5\P1
 */
class BoundaryRange implements ArraySerializable
{
    /** @var Boundary */
    private Boundary $lower;

    /** @var Boundary */
    private Boundary $upper;

    /**
     * BoundaryRange constructor.
     *
     * @param Boundary $lower
     * @param Boundary $upper
     */
    public function __construct(Boundary $lower, Boundary $upper)
    {
        $this->lower = $lower;
        $this->upper = $upper;
    }

    /**
     * @return Boundary
     */
    public function getLower(): Boundary
    {
        return $this->lower;
    }

    /**
     * @return Boundary
     */
    public function getUpper(): Boundary
    {
        return $this->upper;
    }

    /**
     * @param Boundary $boundary
     *
     * @return BoundaryRange
     */
    public static function fromBoundary(Boundary $boundary): BoundaryRange
    {
        $midPoint = $boundary->getMidPoint();

        return new BoundaryRange(
            new Boundary($boundary->getMin(), $midPoint),
            new Boundary($midPoint + 1, $boundary->getMax())
        );
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'lower' => $this->getLower()->toArray(),
            'upper' => $this->getUpper()->toArray(),
        ];
    }
}
