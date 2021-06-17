<?php

namespace AOC\D5\P1;

/**
 * Class MissingSeatFinder
 *
 * @package AOC\D5\P1
 */
class MissingSeatFinder
{
    /**
     * @param array $seats
     *
     * @return Seat|null
     */
    public static function find(array $seats): ?Seat
    {
        $sort = [];

        foreach ($seats as $seat) {
            if (!isset($sort[$seat->getRow()])) {
                $sort[$seat->getRow()] = [];
            }
            $sort[$seat->getRow()][] = $seat->getColumn();
        }

        foreach ($sort as &$columns) {
            sort($columns);
        }

        ksort($sort);
        $keys = array_keys($sort);
        $firstRow = min($keys);
        $lastRow = max($keys);

        foreach ($sort as $rowNumber => $columns) {
            if (!in_array($rowNumber, [$firstRow, $lastRow]) && count($columns) < 8) {
                $diff = array_diff(range(0, 7), array_values($columns));
                if (count($diff) === 1) {
                    return new Seat($rowNumber, reset($diff));
                }
            }
        }

        return null;
    }
}
