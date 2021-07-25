<?php

namespace MyApp\Services;

use SplHeap;

class Ranking extends SplHeap
{
    public function compare(Music $firstMusic, Music $secondMusic): int
    {
        if ($firstMusic->getTimesPlayed() === $secondMusic->getTimesPlayed()) {
            return 0;
        }

        if ($firstMusic->getTimesPlayed() < $secondMusic->getTimesPlayed()) {
            return -1;
        }

        return 1;
    }
}
