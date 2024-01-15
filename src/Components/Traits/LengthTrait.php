<?php

namespace Compwright\OpenrocketFileUtils\Components\Traits;

use SimpleXMLElement;

/**
 * @property SimpleXMLElement $node
 */
trait LengthTrait
{
    public function length(): float
    {
        return (float) $this->node->length;
    }
}
