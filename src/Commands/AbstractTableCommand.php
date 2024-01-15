<?php

namespace Compwright\OpenrocketFileUtils\Commands;

use Compwright\OpenrocketFileUtils\OrkReader;
use Compwright\OpenrocketFileUtils\Views\TableView;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

abstract class AbstractTableCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->addArgument('file', InputArgument::REQUIRED, 'OpenRocket (.ork) file path')
            ->addOption('format', 'f', InputOption::VALUE_REQUIRED, 'Output format', 'ascii', TableView::SUPPORTED_FORMATS);
    }

    final protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $view = new TableView(
            $this->provideTableData(
                OrkReader::newFromFile($input->getArgument('file'))
            )
        );

        $view(
            $input->getOption('format')
        );

        return Command::SUCCESS;
    }

    /**
     * @return iterable<int, mixed>
     */
    abstract protected function provideTableData(OrkReader $reader): iterable;
}
