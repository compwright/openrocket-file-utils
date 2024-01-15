<?php

namespace Compwright\OpenrocketFileUtils\Components;

use SimpleXMLElement;

class FreeformFinSet extends Fin
{
    public function perimeter(): float
    {
        /** @var SimpleXMLElement[] $points */
        $points = [];
        foreach ($this->node->finpoints->children() as $point) {
            $points[] = $point;
        }

        $perimeter = 0;
        for ($i = 0; $i < count($points); $i++) {
            $a = $points[$i]->attributes();
            $b = ($points[$i + 1] ?? $points[0])->attributes();
            $d = $this->distance(
                (float) $a['x'],
                (float) $a['y'],
                (float) $b['x'],
                (float) $b['y']
            );
            $perimeter += $d;
        }

        return $perimeter;
    }

    private function distance(float $x1, float $y1, float $x2, float $y2): float
    {
        return sqrt(pow($x2 - $x1, 2) + pow($y2 - $y1, 2));
    }
}
