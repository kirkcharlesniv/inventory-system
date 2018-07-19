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
            'Unit',
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
        $inventory_type = "";
        $material_type = "";
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
        switch ($row->inventory_type) {
            case 0:
                $type = "Tools and Equipments";
                break;
            case 1:
                $type = "Materials";
                break;
        }
        if ($inventory_type !== 1) {
            $material_type = null;
        } else {
            switch ($row->material_type) {
                case 0:
                    $material_type = "Ream/s";
                    break;
                case 1:
                    $material_type = "Box/es";
                    break;
                case 2:
                    $material_type = "Kilogram/s";
                    break;
                case 3:
                    $material_type = "Piece/s";
                    break;
                case 4:
                    $material_type = "Liter/s";
                    break;
                case 5:
                    $material_type = "Gallon/s";
                    break;
                case 6:
                    $material_type = "Quart/s";
                    break;
            }
        }
        return [
            $type,
            $inventory_type,
            $material_type,
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