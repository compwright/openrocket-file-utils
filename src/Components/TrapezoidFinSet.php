<?php

namespace Compwright\OpenrocketFileUtils\Components;

class TrapezoidFinSet extends Fin
{
    public function rootChord(): float
    {
        return (float) $this->node->rootchord;
    }

    public function tipChord(): float
    {
        return (float) $this->node->tipchord;
    }

    public function span(): float
    {
        return (float) $this->node->height;
    }

    public function sweep(): float
    {
        return (float) $this->node->sweeplength;
    }

    public function area(): float
    {
        return ($this->rootChord() + $this->tipChord()) / 2 * $this->span();
    }

    public function perimeter(): float
    {
        // Special case: no sweep (rectangle or square shape)
        if ($this->sweep() == 0) {
            return (2 * $this->rootChord()) + (2 * $this->span());
        }

        $leadingEdge = sqrt(
            pow($this->span(), 2)
            + pow($this->sweep(), 2)
        );

        $trailingEdge = sqrt(
            pow($this->rootChord() - $this->sweep() - $this->tipChord(), 2)
            + pow($this->span(), 2)
        );

        return $this->rootChord() + $leadingEdge + $this->tipChord() + $trailingEdge;
    }
}
