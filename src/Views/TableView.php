<?php

namespace Compwright\OpenrocketFileUtils\Views;

use InvalidArgumentException;
use League\Csv\HTMLConverter;
use League\Csv\Writer;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Output\ConsoleOutput;

class TableView
{
    public const SUPPORTED_FORMATS = ['ascii', 'csv', 'html', 'json'];

    /** @var iterable<mixed> */
    private iterable $data;

    /**
     * @param iterable<mixed> $data
     */
    public function __construct(iterable $data)
    {
        $this->data = $data;
    }

    public function __invoke(string $format): void
    {
        if (!in_array($format, self::SUPPORTED_FORMATS)) {
            throw new InvalidArgumentException('Unsupported format: ' . $format);
        }

        $this->$format();
    }

    private function ascii(): void
    {
        $data = iterator_to_array($this->data);
        $table = (new Table(new ConsoleOutput()))
            ->setHeaders($data[0])
            ->setRows(array_slice($data, 1));
        $table->render();
    }

    private function csv(): void
    {
        Writer::createFromStream(STDOUT)->insertAll($this->data);
    }

    private function html(): void
    {
        $data = iterator_to_array($this->data);
        $converter = (new HTMLConverter())
            ->table('table-csv-data', 'users')
            ->tr('data-record-offset')
            ->td('title');
        echo $converter->convert(
            array_slice($data, 1),
            $data[0]
        );
    }

    private function json(): void
    {
        $data = iterator_to_array($this->data);
        echo json_encode(
            array_map(
                fn ($row) => array_combine($data[0], $row),
                array_slice($data, 1)
            ),
            JSON_THROW_ON_ERROR
        );
    }
}
