<?php

namespace Compwright\OpenrocketFileUtils\Iterators;

use Compwright\OpenrocketFileUtils\Component;
use Generator;
use IteratorAggregate;

/**
 * @implements IteratorAggregate<int, mixed>
 */
class BomDataTableIterator implements IteratorAggregate
{
    /** @var ComponentIterator<int, Component> */
    private ComponentIterator $components;

    public function __construct(ComponentIterator $components)
    {
        $this->components = $components;
    }

    public function getIterator(): Generator
    {
        yield ['quantity', 'type', 'name', 'manufacturer', 'part'];

        foreach ($this->components as $component) {
            yield [
                $component->quantity(),
                $component->type(),
                $component->name(),
                $component->manufacturer(),
                $component->partNumber(),
            ];
        }
    }
}
