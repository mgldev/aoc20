<?php

namespace AOC\D6\P1;

/**
 * Class Group
 *
 * @package AOC\D6\P1
 */
class Group
{
    /** @var Participant[] */
    private array $participants = [];

    /**
     * @param Participant $participant
     *
     * @return $this
     */
    public function addParticipant(Participant $participant): self
    {
        $this->participants[] = $participant;

        return $this;
    }

    /**
     * @return int
     */
    public function getUnanimouslyAnsweredQuestionCount(): int
    {
        $allAnsweredQuestions = array_map(
            fn (Participant $participant) => $participant->getAnsweredQuestions(),
            $this->participants
        );

        if (count($allAnsweredQuestions) === 1) {
            return count($allAnsweredQuestions[0]);
        }

        return count(call_user_func_array('array_intersect', $allAnsweredQuestions));
    }

    /**
     * @return int
     */
    public function getTotalAnsweredQuestions(): int
    {
        $answeredQuestions = [];

        foreach ($this->participants as $participant) {
            $answeredQuestions = array_merge($answeredQuestions, $participant->getAnsweredQuestions());
        }

        return count(array_unique($answeredQuestions));
    }
}
