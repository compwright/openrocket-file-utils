<?php

namespace Compwright\OpenrocketFileUtils\Components;

use RuntimeException;

class TubeFinSet extends Fin
{
    public function perimeter(): float
    {
        throw new RuntimeException('Cannot compute perimeter of tube fin');
    }
}
