<?php

namespace AOC\D3\P1;

use InvalidArgumentException;

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
     * @return Grid
     */
    public function reset(): Grid
    {
        return $this->setPosition(0, 0);
    }

    /**
     * @param array $map
     *
     * @return Grid
     */
    public function follow(array $map): Grid
    {
        foreach ($map as $instruction) {
            $direction = substr($instruction, 0, 1);
            $places = (int) substr($instruction, 1, strlen($instruction) - 1);
            $this->move($direction, $places);
        }

        return $this;
    }

    /**
     * @param string $direction
     * @param int $places
     *
     * @return Grid
     */
    public function move(string $direction, int $places): Grid
    {
        switch (strtolower($direction)) {
            case 'u':
                return $this->up($places);

            case 'r':
                return $this->right($places);

            case 'd':
                return $this->down($places);

            case 'l':
                return $this->left($places);

            default:
                throw new InvalidArgumentException('Invalid movement');
        }
    }

    /**
     * @param int $x
     * @param int $y
     *
     * @return Grid
     */
    public function setPosition(int $x, int $y): Grid
    {
        $this->x = $x;
        $this->y = $y;

        return $this;
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
