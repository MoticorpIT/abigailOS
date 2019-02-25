<?php

namespace App\Exports;

use App\Company;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CompanyExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Company::all();
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
            'Logo',
            'Incorp_date',
            'Corp_id',
            'City_lic',
            'County_lic',
            'Fed_tax_id',
            'Type_id',
            'Status_id',
            'Created',
            'Updated'
        ];
    }
}
