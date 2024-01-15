<?php

namespace Compwright\OpenrocketFileUtils\Components;

use Compwright\OpenrocketFileUtils\Component;

class Bulkhead extends Component
{
    use Traits\DiameterTrait;
    use Traits\MaterialTrait;

    public function thickness(): float
    {
        return (float) $this->node->length;
    }
}
