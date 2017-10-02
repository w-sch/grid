<?php declare(strict_types=1);

namespace Midnight\Grid\View;

use Midnight\Grid\{
    ColumnInterface, GridInterface, RowInterface
};

final class CsvRenderer implements GridRendererInterface
{
    public function render(GridInterface $grid): string
    {
        $fh = @fopen( 'php://output', 'w' );
        $this->headers($fh, $grid);
        $this->rows($fh, $grid);
        fclose($fh);

        return '';
    }

    private function headers($fh, GridInterface $grid): void
    {
        fputcsv($fh, $grid->getColumns());
    }

    private function rows($fh, GridInterface $grid): void
    {
        array_map(function (RowInterface $row) use ($fh, $grid) {
            fputcsv($fh, $row->getRowData());
        }, $grid->getRows());
    }
}
