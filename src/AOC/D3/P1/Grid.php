<?php

namespace AOC\D3\P1;

/**
 * Class Grid
 *
 * @package AOC\D2\P3
 */
class Grid
{
    private $x = 0;

    private $y = 0;

    /** @var array */
    private $cells;

    /**
     * Grid constructor.
     * @param array $cells
     */
    public function __construct(array $cells)
    {
        $this->cells = $cells;
    }

    /**
     * @param int $x
     * @param int $y
     */
    public function setPosition(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function up(int $places): Grid
    {
        $this->y -= $places;

        return $this;
    }

    public function right(int $places): Grid
    {
        $this->x += $places;

        return $this;
    }

    public function down(int $places): Grid
    {
        $this->y += $places;

        return $this;
    }

    public function left(int $places): Grid
    {
        $this->x -= $places;

        return $this;
    }

    /**
     * @param int $x
     * @param int $y
     *
     * @return mixed
     */
    public function getCell(int $x, int $y)
    {
        return $this->cells[$y][$x] ?? null;
    }

    /**
     * @return mixed
     */
    public function getCurrentCell()
    {
        return $this->getCell($this->x, $this->y);
    }
}
