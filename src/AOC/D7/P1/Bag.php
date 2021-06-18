<?php

namespace AOC\D7\P1;

/**
 * Class Bag
 *
 * @package AOC\D7\P1
 */
class Bag
{
    /** @var string */
    private string $colour;

    /** @var BagStorageSpecification[] */
    private array $specifications = [];

    /**
     * Bag constructor.
     *
     * @param string $colour
     */
    public function __construct(string $colour)
    {
        $this->colour = $colour;
    }

    /**
     * @return string
     */
    public function getColour(): string
    {
        return $this->colour;
    }

    /**
     * @param BagStorageSpecification $specification
     *
     * @return $this
     */
    public function addSpecification(BagStorageSpecification $specification): self
    {
        $this->specifications[] = $specification;

        return $this;
    }

    /**
     * @return array
     */
    public function toColoursArray(): array
    {
        $colours = [$this->getColour()];

        foreach ($this->specifications as $specification) {
            $bag = $specification->getBag();
            $colours[] = $bag->getColour();
            $colours = array_merge($colours, $bag->toColoursArray());
        }

        return array_unique($colours);
    }

    /**
     * @param string $colour
     *
     * @return bool
     */
    public function supportsColour(string $colour): bool
    {
        return $this->getColour() !== $colour && in_array($colour, $this->toColoursArray());
    }

    /**
     * @return int
     */
    public function calculateTotalCompositeBags(): int
    {
        $total = 0;

        foreach ($this->specifications as $specification) {
            $quantity = $specification->getMaxQuantity();
            $total += $quantity + ($quantity * $specification->getBag()->calculateTotalCompositeBags());
        }

        return $total;
    }
}
