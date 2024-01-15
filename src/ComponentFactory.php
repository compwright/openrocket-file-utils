<?php

namespace Compwright\OpenrocketFileUtils;

use SimpleXMLElement;

class ComponentFactory
{
    public function new(SimpleXMLElement $node): Component
    {
        switch ($node->getName()) {
            case 'bodytube':
                return new Components\BodyTube($node);
            case 'bulkhead':
                return new Components\Bulkhead($node);
            case 'centeringring':
                return new Components\CenteringRing($node);
            case 'ellipticalfinset':
                return new Components\EllipticalFinSet($node);
            case 'engineblock':
                return new Components\EngineBlock($node);
            case 'freeformfinset':
                return new Components\FreeformFinSet($node);
            case 'mass':
                switch ((string) $node->masscomponenttype) {
                    case 'altimeter':
                        return new Components\Altimeter($node);
                    case 'flightcomputer':
                        return new Components\FlightComputer($node);
                    case 'recoveryhardware':
                        return new Components\RecoveryHardware($node);
                    default:
                        return new Components\Weight($node);
                }
            case 'nosecone':
                return new Components\NoseCone($node);
            case 'parachute':
                return new Components\Parachute($node);
            case 'podset':
                return new Components\Podset($node);
            case 'shockcord':
                return new Components\ShockCord($node);
            case 'stage':
                return new Components\Stage($node);
            case 'streamer':
                return new Components\Streamer($node);
            case 'transition':
                return new Components\Transition($node);
            case 'trapezoidfinset':
                return new Components\TrapezoidFinSet($node);
            case 'tubecoupler':
                return new Components\TubeCoupler($node);
            case 'tubefinset':
                return new Components\TubeFinSet($node);
            default:
                return new Component($node);
        }
    }
}
