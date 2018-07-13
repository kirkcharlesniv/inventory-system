<?php

namespace App\Exports;
use App\Item;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use \Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;

class ItemsRecords implements FromCollection, WithMapping, ShouldAutoSize, WithHeadings, WithTitle
{
    public function collection()
    {
        // TODO: Implement collection() method.
        return Item::all();
    }

    public function headings(): array
    {
        return [
            'Item ID',
            'Stock Code',
            'Name',
            'Description',
            'Initial Stocks',
            'Remaining Stocks'
        ];
    }

    /**
     * @param mixed $row
     *
     * @return array
     */
    public function map($row): array
    {
        return [
            $row->id,
            $row->stock_code,
            $row->name,
            $row->description,
            $row->initial_stocks,
            $row->remaining_stocks
        ];
    }

    public function title(): string
    {
        return 'Item Records';
    }
}