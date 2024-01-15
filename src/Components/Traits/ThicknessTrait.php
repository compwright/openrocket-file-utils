<?php

namespace Compwright\OpenrocketFileUtils\Components\Traits;

use SimpleXMLElement;

/**
 * @property SimpleXMLElement $node
 */
trait ThicknessTrait
{
    public function thickness(): float
    {
        return (float) $this->node->thickness;
    }
}
