<?php

namespace AOC\D5\P1;

/**
 * Class Boundary
 *
 * @package AOC\D5\P1
 */
class Boundary implements ArraySerializable
{
    /** @var int */
    private int $min;

    /** @var int */
    private int $max;

    /**
     * Boundary constructor.
     *
     * @param int $min
     * @param int $max
     */
    public function __construct(int $min, int $max)
    {
        $this->min = $min;
        $this->max = $max;
    }

    /**
     * @return int
     */
    public function getMin(): int
    {
        return $this->min;
    }

    /**
     * @return int
     */
    public function getMax(): int
    {
        return $this->max;
    }

    /**
     * @return int
     */
    public function getMidPoint(): int
    {
        return ($this->getMin() + $this->getMax()) / 2;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'min' => $this->getMin(),
            'max' => $this->getMax(),
        ];
    }
}