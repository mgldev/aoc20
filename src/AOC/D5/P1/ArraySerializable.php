<?php

namespace AOC\D5\P1;

/**
 * Interface ArraySerializable
 *
 * @package AOC\D5\P1
 */
interface ArraySerializable
{
    /**
     * @return array
     */
    public function toArray(): array;
}