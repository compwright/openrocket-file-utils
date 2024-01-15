<?php

namespace Compwright\OpenrocketFileUtils\Components\Traits;

use SimpleXMLElement;

/**
 * @property SimpleXMLElement $node
 */
trait MaterialTrait
{
    public function material(): string
    {
        return (string) $this->node->material->attributes()->material;
    }

    public function materialType(): string
    {
        return (string) $this->node->material->attributes()->type;
    }

    public function density(): float
    {
        return (float) $this->node->material->attributes()->density;
    }
}
