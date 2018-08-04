<?php
/**
 * Created by PhpStorm.
 * User: Kirk Charles
 * Date: 19/07/2018
 * Time: 3:26 PM
 */

namespace App\Exports;
use App\Item;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use \Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\WithTitle;


class Materials implements FromCollection, WithMapping, ShouldAutoSize, WithHeadings, WithTitle, WithStrictNullComparison
{
    public function collection()
    {
        // TODO: Implement collection() method.
        return Item::where('inventory_type', '1')->orderBy('stock_code', 'asc')->get();
    }
    public function headings(): array
    {
        return [
            'Stock Type',
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
        $material_unit = "";
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
            default:
                $material_unit = "N/A";
                break;
        }

        return [
            $type,
            $material_unit,
            $row->name,
            $row->description,
            $row->initial_stocks,
            $row->remaining_stocks
        ];
    }

    public function title(): string
    {
        return 'Materials Records';
    }
}