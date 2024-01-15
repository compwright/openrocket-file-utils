<?php

namespace Compwright\OpenrocketFileUtils\Components;

use Compwright\OpenrocketFileUtils\Component;

abstract class Fin extends Component
{
    use Traits\MaterialTrait;
    use Traits\ThicknessTrait;

    public function quantity(): int
    {
        $quantity = (int) ($this->node->fincount ?? 1);

        return $this->podset
            ? $this->podset->quantity() * $quantity
            : $quantity;
    }

    abstract public function perimeter(): float;
}
