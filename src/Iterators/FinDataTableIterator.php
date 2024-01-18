<?php

namespace Compwright\OpenrocketFileUtils\Iterators;

use Compwright\OpenrocketFileUtils\Components\Fin;
use Generator;
use IteratorAggregate;

/**
 * @implements IteratorAggregate<int, mixed>
 */
class FinDataTableIterator implements IteratorAggregate
{
    /** @var FinIterator<int, Fin> */
    private FinIterator $fins;

    public function __construct(FinIterator $fins)
    {
        $this->fins = $fins;
    }

    public function getIterator(): Generator
    {
        yield ['name', 'perimeter'];

        $total = 0.0;

        foreach ($this->fins as $fin) {
            $perimeter = $fin->perimeter() * $fin->quantity();
            $total += $perimeter;
            yield [$fin->name(), $perimeter];
        }

        yield ['total', $total];
    }
}
