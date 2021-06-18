<?php

namespace AOC\D9\P1;

/**
 * Class XMASParser
 *
 * @package AOC\D9\P1
 */
class XMASParser
{
    /** @var int */
    private const PREAMBLE_LENGTH = 25;

    /** @var int[] */
    private array $numbers;

    /**
     * XMASParser constructor.
     *
     * @param string $inputFilename
     */
    public function __construct(string $inputFilename)
    {
        $this->numbers = array_map(fn (string $line) => (int) trim($line), file($inputFilename));
    }

    /**
     * Find a contiguous set of numbers which sum to the invalid number, returning (min + max) of the identified range
     *
     * @return int
     */
    public function findContiguousSum(): int
    {
        $targetNumber = $this->findInvalidNumber();
        $start = 0;

        while (true) {
            $pool = [];

            for ($i = $start; $i < count($this->numbers); $i++) {
                $pool[] = $this->numbers[$i];
                if (array_sum($pool) === $targetNumber) {
                    return min($pool) + max($pool);
                }
            }

            $start++;
        }
    }

    /**
     * Find the invalid number
     *
     * @return int
     */
    public function findInvalidNumber()
    {
        $position = self::PREAMBLE_LENGTH;

        while (true) {
            $targetNumber = $this->numbers[$position];
            $lookbackNumbers = $this->getLookbackArray($position);
            $match = false;

            foreach ($lookbackNumbers as $a) {
                foreach ($lookbackNumbers as $b) {
                    $sum = $a + $b;
                    if ($sum === $targetNumber && $a !== $b) {
                        $match = true;
                        break 2;
                    }
                }
            }

            if (!$match) {
                return $targetNumber;
            }

            $position++;
        }
    }

    /**
     * Generate a lookback array for a given position, i.e. position 25 yields a 25 element array, [0 ... 24]
     *
     * @param int $position
     *
     * @return int[]
     */
    private function getLookbackArray(int $position): array
    {
        return array_slice($this->numbers, $position - self::PREAMBLE_LENGTH, self::PREAMBLE_LENGTH);
    }
}
