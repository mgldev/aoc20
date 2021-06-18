<?php

namespace AOC\D7\P1;

/**
 * Class BagStorageSpecification
 *
 * @package AOC\D7\P1
 */
class BagStorageSpecification
{
    /** @var Bag */
    private Bag $bag;

    /** @var int */
    private int $maxQuantity;

    /**
     * BagStorageSpecification constructor.
     *
     * @param Bag $bag
     * @param int $maxQuantity
     */
    public function __construct(Bag $bag, int $maxQuantity)
    {
        $this->bag = $bag;
        $this->maxQuantity = $maxQuantity;
    }

    /**
     * @return Bag
     */
    public function getBag(): Bag
    {
        return $this->bag;
    }

    /**
     * @return int
     */
    public function getMaxQuantity(): int
    {
        return $this->maxQuantity;
    }
}
