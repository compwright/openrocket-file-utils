<?php

namespace Compwright\OpenrocketFileUtils\Components;

use Compwright\OpenrocketFileUtils\Component;

class NoseCone extends Component
{
    use Traits\DiameterTrait;
    use Traits\LengthTrait;
    use Traits\ThicknessTrait;
    use Traits\MaterialTrait;

    public function shape(): string
    {
        return (string) $this->node->shape;
    }

    public function ratio(): float
    {
        return $this->length() / $this->diameter();
    }
}
