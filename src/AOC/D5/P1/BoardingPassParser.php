<?php

namespace AOC\D5\P1;

/**
 * Class BoardingPassParser
 *
 * @package AOC\D5\P1
 */
class BoardingPassParser
{
    /** @var SeatResolver */
    private SeatResolver $seatResolver;

    /**
     * BoardingPassParser constructor.
     *
     * @param SeatResolver $seatResolver
     */
    public function __construct(SeatResolver $seatResolver)
    {
        $this->seatResolver = $seatResolver;
    }

    /**
     * @param string $filename
     *
     * @return Seat[]
     */
    public function getSeats(string $filename): array
    {
        $seats = [];
        $lines = file($filename);

        foreach ($lines as $partitionString) {
            if (strlen(trim($partitionString)) === 0) continue;
            $seats[] = $this->seatResolver->resolve(new Partition($partitionString));
        }

        return $seats;
    }
}
