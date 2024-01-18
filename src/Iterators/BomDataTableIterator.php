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

        $total = 0;

        foreach ($this->components as $component) {
            $total += $component->quantity();

            yield [
                $component->quantity(),
                $component->type(),
                $component->name(),
                $component->manufacturer(),
                $component->partNumber(),
            ];
        }

        yield ['total', $total];
    }
}
