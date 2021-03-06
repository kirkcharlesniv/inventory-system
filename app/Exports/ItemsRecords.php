<?php

namespace App\Exports;
use App\Item;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use \Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\WithTitle;

class ItemsRecords implements FromCollection, WithMapping, ShouldAutoSize, WithHeadings, WithTitle, WithStrictNullComparison
{
    public function collection()
    {
        // TODO: Implement collection() method.
        return Item::orderBy('name', 'asc')->get();
    }

    public function headings(): array
    {
        return [
            'Stock Type',
            'Inventory Type',
            'Unit',
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
        $material_unit = "N/A";
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
        switch ($row->material_unit) {
            case 0:
                $material_unit = "Ream/s";
                break;
            case 1:
                $material_unit = "Box/es";
                break;
            case 2:
                $material_unit = "Kilogram/s";
                break;
            case 3:
                $material_unit = "Piece/s";
                break;
            case 4:
                $material_unit = "Liter/s";
                break;
            case 5:
                $material_unit = "Gallon/s";
                break;
            case 6:
                $material_unit = "Quart/s";
                break;
            case 7:
                $material_unit = "Set/s";
                break;
            case 8:
                $material_unit = "Unit/s";
                break;
        }
        switch ($row->inventory_type) {
            case 0:
                $inventory_type = "Tools and Equipments";
                break;
            case 1:
                $inventory_type = "Materials";
                break;
        }

        return [
            $type,
            $inventory_type,
            $material_unit,
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