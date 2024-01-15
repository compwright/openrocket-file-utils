<?php

namespace Compwright\OpenrocketFileUtils\Components;

use Compwright\OpenrocketFileUtils\Component;

class CenteringRing extends Component
{
    use Traits\DiameterTrait;
    use Traits\MaterialTrait;

    public function thickness(): float
    {
        return (float) $this->node->length;
    }

    public function innerRadius(): float
    {
        return (float) $this->node->innerradius;
    }
}
