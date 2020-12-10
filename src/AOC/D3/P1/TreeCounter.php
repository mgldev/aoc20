<?php

namespace AOC\D3\P1;

/**
 * Class TreeCounter
 *
 * @package AOC\D3\P1
 */
class TreeCounter
{
    /** @var Grid */
    private Grid $landscape;

    /**
     * TreeCounter constructor.
     *
     * @param Grid $landscape
     */
    public function __construct(Grid $landscape)
    {
        $this->landscape = $landscape;
    }

    /**
     * @param array $directions
     *
     * @return int
     */
    public function getTreeCount(array $directions): int
    {
        $this->landscape->reset();

        $treeCount = 0;

        while (($cell = $this->landscape->getCurrentCell()) !== null) {
            $treeCount += (int) ($cell === '#');
            $this->landscape->follow($directions);
        }

        return $treeCount;
    }
}
