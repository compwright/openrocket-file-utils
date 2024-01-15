<?php

namespace Compwright\OpenrocketFileUtils\Components;

class EllipticalFinSet extends Fin
{
    public function rootChord(): float
    {
        return (float) $this->node->rootchord;
    }

    public function span(): float
    {
        return (float) $this->node->height;
    }

    public function area(): float
    {
        $a = $this->rootChord() / 2;
        $b = $this->span() / 2;
        return pi() * $a * $b / 2;
    }

    public function perimeter(): float
    {
        $a = $this->rootChord() / 2;
        $b = $this->span() / 2;
        $a_minus_b_squared = pow($a - $b, 2);
        $a_plus_b_squared = pow($a + $b, 2);
        return pi()
            * ($a + $b)
            * (
                1 + (
                    3 * $a_minus_b_squared / (
                        $a_plus_b_squared * (
                            10 + sqrt(
                                4 + (
                                    -3 * $a_minus_b_squared / $a_plus_b_squared
                                )
                            )
                        )
                    )
                )
            );
    }
}
