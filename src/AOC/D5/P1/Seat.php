<?php

namespace AOC\D5\P1;

/**
 * Class Seat
 *
 * @package AOC\D5\P1
 */
class Seat
{
    /** @var int */
    private int $row;

    /** @var int */
    private int $column;

    /**
     * Seat constructor.
     *
     * @param int $row
     * @param int $column
     */
    public function __construct(int $row, int $column)
    {
        $this->row = $row;
        $this->column = $column;
    }

    /**
     * @return int
     */
    public function getRow(): int
    {
        return $this->row;
    }

    /**
     * @return int
     */
    public function getColumn(): int
    {
        return $this->column;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return ($this->getRow() * 8) + $this->getColumn();
    }
}
