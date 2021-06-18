<?php

namespace AOC\D8\P2;

use AOC\D8\P1\Console;
use AOC\D8\P1\InfiniteLoopException;
use AOC\D8\P1\Instruction;
use AOC\D8\P1\Program;

/**
 * Class ProgramRepairer
 *
 * @package AOC\D8\P2
 */
class ProgramRepairer
{
    /** @var Console */
    private Console $console;

    /**
     * ProgramRepairer constructor.
     *
     * @param Console $console
     */
    public function __construct(Console $console)
    {
        $this->console = $console;
    }

    /**
     * @param Program $program
     *
     * @return int
     */
    public function repair(Program $program): int
    {
        // any nop / jmp command is a candidate for repairing
        $repairableInstructions = $program->filter(['nop', 'jmp']);

        foreach ($repairableInstructions as $position => $instruction) {
            // take a backup of the original instruction, we'll need to restore it if the repair fails
            $backup = clone $instruction;

            // flip the repair candidate (i.e. nop to jmp or jmp to nop)
            $this->flipInstruction($instruction);

            try {
                // attempt to execute the program successfully
                return $this->console->execute($program);
            } catch (InfiniteLoopException $infiniteLoopException) {
                // we hit an infinite loop, restore the original instruction, proceed to next repair attempt
                $program->setInstruction($position, $backup);
                continue;
            }
        }
    }

    /**
     * @param Instruction $instruction
     */
    private function flipInstruction(Instruction $instruction): void
    {
        $instruction->setCommand($instruction->getCommand() === 'jmp' ? 'nop' : 'jmp');
    }
}
