<?php

namespace Compwright\OpenrocketFileUtils\Components;

use Compwright\OpenrocketFileUtils\Component;

class ShockCord extends Component
{
    use Traits\MaterialTrait;

    public function length(): float
    {
        return (float) $this->node->length;
    }
}
