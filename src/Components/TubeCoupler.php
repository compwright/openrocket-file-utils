<?php

namespace Compwright\OpenrocketFileUtils\Components;

use Compwright\OpenrocketFileUtils\Component;

class TubeCoupler extends Component
{
    use Traits\DiameterTrait;
    use Traits\LengthTrait;
    use Traits\ThicknessTrait;
    use Traits\MaterialTrait;
}
