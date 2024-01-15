<?php

namespace Compwright\OpenrocketFileUtils\Components\Traits;

use SimpleXMLElement;

/**
 * @property SimpleXMLElement $node
 */
trait DiameterTrait
{
    public function radius(): float
    {
        return (float) ($this->node->outerradius ?? $this->node->radius);
    }

    public function diameter(): float
    {
        return 2 * $this->radius();
    }
}
