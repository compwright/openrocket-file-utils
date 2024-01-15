<?php

namespace Compwright\OpenrocketFileUtils\Iterators;

// use Compwright\OpenrocketFileUtils\Components\Podset;

use Compwright\OpenrocketFileUtils\Component;
use Compwright\OpenrocketFileUtils\ComponentFactory;
use Compwright\OpenrocketFileUtils\Components\Stage;
use Generator;
use IteratorAggregate;
use SimpleXMLElement;

/**
 * @implements IteratorAggregate<Component>
 */
class ComponentIterator implements IteratorAggregate
{
    private SimpleXMLElement $node;

    private ?Stage $stage = null;

    // private ?Podset $podset = null;

    private ComponentFactory $factory;

    public function __construct(SimpleXMLElement $node, ?Stage $stage = null/*, ?Podset $podset = null*/)
    {
        $this->node = $node;
        $this->stage = $stage;
        // $this->podset = $podset;
        $this->factory = new ComponentFactory();
    }

    public function getIterator(): Generator
    {
        foreach ($this->node as $node) {
            $component = $this->factory->new($node);

            switch ($component->type()) {
                case 'stage':
                    /** @var Stage $stage */
                    $stage = $component;
                    $stage->setStage($stage);
                    break;

                case 'podset':
                    // $podset = $component;
                    // $component->setStage($stage ?? $this->stage ?? null);
                    // $component->setPodset($podset);
                    break;

                default:
                    $component->setStage($stage ?? $this->stage ?? null);
                    // $component->setPodset($podset ?? $this->podset ?? null);
                    yield $component;
            }

            if ($node->subcomponents) {
                yield from $component->subcomponents();
            }
        }
    }
}
