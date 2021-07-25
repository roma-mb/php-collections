<?php

namespace MyApp\Services;

use SplDoublyLinkedList;
use SplFixedArray;
use SplQueue;
use SplStack;

class Player
{
    private SplDoublyLinkedList $linkedList;
    private SplStack $splStack;
    private SplQueue $splQueue;
    private Ranking $ranking;

    public function __construct()
    {
        $this->linkedList = new SplDoublyLinkedList();
        $this->splStack   = new SplStack();
        $this->splQueue   = new SplQueue();
        $this->ranking    = new Ranking();

        $this->linkedList->rewind();
    }

    public function includeMusics(SplFixedArray $fixedArray): void
    {
        for ($fixedArray->rewind(); $fixedArray->valid(); $fixedArray->next()) {
            $this->linkedList->push($fixedArray->current());
        }

        $this->linkedList->rewind();
    }

    public function playLastMusic(): void
    {
        echo "Playing last music: " . $this->splStack->pop() . "<br>";
    }

    public function playMusic(): void
    {
        if ($this->linkedList->count() === 0) {
            echo 'No musics on player.';
        }

        $this->splStack->push($this->linkedList->current());


        $this->linkedList->current()->play();
    }

    public function addMusic($music): void
    {
        $this->linkedList->push($music);
    }

    public function skipMusic(): void
    {
        $this->linkedList->next();

        if (!$this->linkedList->valid()) {
            $this->linkedList->rewind();
        }
    }

    public function rewindMusic(): void
    {
        $this->linkedList->prev();

        if (!$this->linkedList->valid()) {
            $this->linkedList->rewind();
        }
    }

    public function listMusics(): void
    {
        for ($this->linkedList->rewind(); $this->linkedList->valid(); $this->linkedList->next()) {
            echo "Músic: " . $this->linkedList->current() . "<br>";
        }
    }

    public function countMusics(): void
    {
        echo "Existem " . $this->linkedList->count() . " músicas no tocador." . "<br>";
    }

    public function addMusicInFirstPosition($music): void
    {
        $this->linkedList->unshift($music);
    }

    public function removeMusicOfFirstPosition(): void
    {
        $this->linkedList->shift();
    }
    public function removeMusicOfLastPosition(): void
    {
        $this->linkedList->pop();
    }

    public function download(): void
    {
        if ($this->linkedList->count() > 0) {
            for ($this->linkedList->rewind(); $this->linkedList->valid(); $this->linkedList->next()) {
                $this->splQueue->push($this->linkedList->current());
            }

            for ($this->splQueue->rewind(); $this->splQueue->valid(); $this->splQueue->next()) {
                echo "Downloading... " . $this->splQueue->current() . '<br>';
            }
        } else {
            echo "No music was found for download.";
        }
    }

    public function ranking(): void
    {
        foreach ($this->linkedList as $list) {
            $this->ranking->insert($list);
        }

        foreach ($this->ranking as $ranking) {
            echo $ranking->getName() . ' - ' . $ranking->getTimesPlayed() . "<br>";
        }
    }
}
