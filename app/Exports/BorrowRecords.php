<?php

namespace App\Exports;
use App\Borrow;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use \Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\WithTitle;

class BorrowRecords implements FromCollection, WithMapping, ShouldAutoSize, WithStrictNullComparison, WithHeadings, WithTitle
{
    public function collection()
    {
        // TODO: Implement collection() method.
        return Borrow::all();
    }

    public function headings(): array
    {
        return [
            'Item ID',
            'User ID',
            'Borrow ID',
            'Borrowed',
            'Returned',
            'Status',
            'Borrowed at',
            'Last returned at'
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
            $row->item_id,
            $row->user_id,
            $row->borrow_id,
            $row->borrowed,
            $row->returned,
            $row->status,
            $row->created_at,
            $row->updated_at
        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Borrow Records';
    }
}