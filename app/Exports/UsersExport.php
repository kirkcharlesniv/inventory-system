<?php

namespace App\Exports;
use App\Employee;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use \Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;

class UsersExport implements FromCollection, WithMultipleSheets, WithMapping, ShouldAutoSize, WithHeadings, WithTitle
{
    public function collection()
    {
        // TODO: Implement collection() method.
        return Employee::all();
    }

    public function headings(): array
    {
        return [
            'ID Number',
            'Name',
            'Address',
            'Phone',
            'TIN Number'
        ];
    }

    public function map($row): array
    {
        return [
            $row->id_num,
            $row->name,
            $row->address,
            $row->phone,
            $row->tin_number.'-000'
        ];
    }

    /**
     * @param mixed $row
     *
     * @return array
     */

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [
            'Users',
            'Borrow Records',
            'Items Records'
        ];
        $sheets[0] = new UsersExport();
        $sheets[1] = new BorrowRecords();
        $sheets[2] = new ItemsRecords();

        return $sheets;
    }

    /**
     * @param mixed $row
     *
     * @return array
     */
    public function title(): string
    {
        return 'Users';
    }
}