<?php

namespace App\Exports;

use App\Asset;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AssetExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Asset::all();
    }

    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Street_1',
            'Street_2',
            'City',
            'State',
            'Zip',
            'Phone_1',
            'Phone_2',
            'Fax',
            'Email',
            'Rent',
            'Deposit',
            'Aquired',
            'Type_id',
            'Company_id',
            'Status_id',
            'Created',
            'Updated'
        ];
    }
}
