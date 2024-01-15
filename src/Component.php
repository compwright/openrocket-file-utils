<?php

namespace Compwright\OpenrocketFileUtils;

use Compwright\OpenrocketFileUtils\Components\Podset;
use Compwright\OpenrocketFileUtils\Components\Stage;
use Compwright\OpenrocketFileUtils\Iterators\ComponentIterator;
use SimpleXMLElement;

class Component
{
    protected SimpleXMLElement $node;

    protected ?Stage $stage = null;

    protected ?Podset $podset = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->node = $node;
    }

    public function name(): string
    {
        return (string) $this->node->name;
    }

    public function type(): string
    {
        return $this->node->getName();
    }

    /**
     * @return ComponentIterator<Component>
     */
    public function subcomponents(): ComponentIterator
    {
        return new ComponentIterator(
            $this->node->subcomponents->children(),
            $this->stage()/*,
            $this->podset()*/
        );
    }

    public function setStage(?Stage $stage): void
    {
        $this->stage = $stage;
    }

    public function stage(): ?Stage
    {
        return $this->stage ?? null;
    }

    public function setPodset(?Podset $podset): void
    {
        $this->podset = $podset;
    }

    public function podset(): ?Podset
    {
        return $this->podset ?? null;
    }

    public function quantity(): int
    {
        if (strlen((string) $this->node->instancecount) === 0) {
            $quantity = 1;
        } else {
            $quantity = (int) $this->node->instancecount;
        }

        return $this->podset
            ? $this->podset->quantity() * $quantity
            : $quantity;
    }

    public function manufacturer(): ?string
    {
        $preset = $this->node->preset->attributes();
        if ($preset) {
            return (string) $preset->manufacturer;
        }
        return null;
    }

    public function partNumber(): ?string
    {
        $preset = $this->node->preset->attributes();
        if ($preset) {
            return (string) $preset->partno;
        }
        return null;
    }
}
