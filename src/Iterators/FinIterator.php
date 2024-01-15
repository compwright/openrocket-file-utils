<?php

namespace Compwright\OpenrocketFileUtils\Iterators;

use Compwright\OpenrocketFileUtils\Components\Fin;
use FilterIterator;

class FinIterator extends FilterIterator
{
    public function accept(): bool
    {
        return $this->current() instanceof Fin;
    }
}
