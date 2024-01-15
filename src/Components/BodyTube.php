<?php

namespace Compwright\OpenrocketFileUtils\Components;

use Compwright\OpenrocketFileUtils\Component;

class BodyTube extends Component
{
    use Traits\DiameterTrait;
    use Traits\LengthTrait;
    use Traits\ThicknessTrait;
    use Traits\MaterialTrait;
}
