<?php

namespace Compwright\OpenrocketFileUtils\Commands;

use Compwright\OpenrocketFileUtils\Iterators\BomDataTableIterator;
use Compwright\OpenrocketFileUtils\OrkReader;

class BomTableCommand extends AbstractTableCommand
{
    protected function configure(): void
    {
        parent::configure();
        $this->setDescription('Create a bill of materials (BOM)');
    }

    protected function provideTableData(OrkReader $reader): iterable
    {
        return new BomDataTableIterator(
            $reader->components()
        );
    }
}
