<?php

namespace AOC\D7\P1;

/**
 * Class BagCollection
 *
 * @package AOC\D7\P1
 */
class BagCollection
{
    /** Bag[] */
    private array $bags;

    /**
     * @param Bag $bag
     *
     * @return $this
     */
    public function addBag(Bag $bag): self
    {
        $this->bags[$bag->getColour()] = $bag;

        return $this;
    }

    /**
     * @param string $colour
     *
     * @return Bag|null
     */
    public function getBag(string $colour): ?Bag
    {
        return $this->bags[$colour] ?? null;
    }

    /**
     * @return array
     */
    public function getBags(): array
    {
        return $this->bags;
    }

    /**
     * @param string $colour
     *
     * @return int
     */
    public function countBagsSupportingColour(string $colour): int
    {
        return count(array_filter($this->bags, fn (Bag $bag) => $bag->supportsColour($colour)));
    }
}