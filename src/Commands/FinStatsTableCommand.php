<?php

namespace Compwright\OpenrocketFileUtils\Commands;

use Compwright\OpenrocketFileUtils\Iterators\FinDataTableIterator;
use Compwright\OpenrocketFileUtils\OrkReader;

class FinStatsTableCommand extends AbstractTableCommand
{
    protected function configure(): void
    {
        parent::configure();
        $this->setDescription('Get production stats about the fins');
    }

    protected function provideTableData(OrkReader $reader): iterable
    {
        return new FinDataTableIterator(
            $reader->fins()
        );
    }
}
