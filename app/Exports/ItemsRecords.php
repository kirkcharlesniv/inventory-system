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
            'Stock Type',
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
        $type = "";
        switch ($row->stock_type) {
            case 0:
                $type = "SMAW NC I";
                break;
            case 1:
                $type = "Pipefitting  NC II";
                break;
            case 2:
                $type = "Dressmaking NC 2";
                break;
            case 3:
                $type = "Construction Painting NC II";
                break;
            case 4:
                $type = "Office Supply";
                break;
        }
        return [
            $type,
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