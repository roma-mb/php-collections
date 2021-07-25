<?php

namespace MyApp\Services;

class Music
{
    private string $name;
    private int $timesPlayed;

    public function __construct(string $name)
    {
        $this->name        = $name;
        $this->timesPlayed = 0;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getTimesPlayed(): int
    {
        return $this->timesPlayed;
    }

    public function play()
    {
        $this->timesPlayed++;
        echo 'Playing: ' . $this->getName() . "</br>";
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
