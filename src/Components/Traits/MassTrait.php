<?php

namespace Compwright\OpenrocketFileUtils\Components\Traits;

use SimpleXMLElement;

/**
 * @property SimpleXMLElement $node
 */
trait MassTrait
{
    public function mass(): float
    {
        return (float) $this->node->mass;
    }
}
