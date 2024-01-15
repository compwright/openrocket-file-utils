<?php

namespace Compwright\OpenrocketFileUtils\Components;

use Compwright\OpenrocketFileUtils\Component;

class EngineBlock extends Component
{
    use Traits\DiameterTrait;
    use Traits\LengthTrait;
    use Traits\ThicknessTrait;
    use Traits\MaterialTrait;
}
