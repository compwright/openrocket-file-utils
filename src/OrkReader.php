<?php

namespace Compwright\OpenrocketFileUtils;

use Compwright\OpenrocketFileUtils\Iterators\ComponentIterator;
use Compwright\OpenrocketFileUtils\Iterators\FinIterator;
use RuntimeException;
use SimpleXMLElement;
use ZipArchive;

class OrkReader
{
    private SimpleXMLElement $xml;

    public function __construct(SimpleXMLElement $xml)
    {
        $this->xml = $xml;
    }

    public static function newFromFile(string $file): self
    {
        $za = new ZipArchive();
        $za->open($file);
        $xml = $za->getFromIndex(0);
        if ($xml === false) {
            throw new RuntimeException('Could not read XML from file: ' . $file);
        }
        $reader = simplexml_load_string($xml);
        if ($reader === false) {
            throw new RuntimeException('Could not read XML from file: ' . $file);
        }
        return new self($reader);
    }

    public function version(): string
    {
        return (string) ($this->xml->attributes()['version'] ?? '');
    }

    public function creator(): string
    {
        return (string) ($this->xml->attributes()['creator'] ?? '');
    }

    public function name(): string
    {
        return (string) $this->xml->rocket->name;
    }

    /**
     * @return ComponentIterator<Component>
     */
    public function components(): ComponentIterator
    {
        return new ComponentIterator($this->xml->rocket->subcomponents->children());
    }

    public function fins(): FinIterator
    {
        return new FinIterator($this->components()->getIterator());
    }
}
