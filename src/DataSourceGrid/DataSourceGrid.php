<?php declare(strict_types = 1);

namespace Midnight\Grid\DataSourceGrid;

use Midnight\Grid\{
    ColumnInterface, DataSourceGrid\DataSource\RecordInterface, GridInterface, RowInterface, SimpleColumn
};

class DataSourceGrid implements GridInterface
{
    /** @var DataSource\DataSourceInterface */
    private $dataSource;

    /**
     * DataSourceGrid constructor.
     * @param DataSource\DataSourceInterface $dataSource
     */
    public function __construct(DataSource\DataSourceInterface $dataSource)
    {
        $this->dataSource = $dataSource;
    }

    /**
     * @return RowInterface[]
     */
    public function getRows():array
    {
        return array_map([$this, 'createRow'], $this->dataSource->getRecords());
    }

    private function createRow(RecordInterface $record):RowInterface
    {
        return new RecordRow($record);
    }

    /**
     * @return string[]
     */
    public function getColumnKeys():array
    {
        return $this->dataSource->getFieldNames();
    }

    /**
     * @return ColumnInterface[]
     */
    public function getColumns():array
    {
        return array_map([$this, 'createColumn'], $this->dataSource->getFieldNames());
    }

    private function createColumn(string $key):ColumnInterface
    {
        return new SimpleColumn($key);
    }
}