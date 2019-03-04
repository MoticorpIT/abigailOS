<?php

namespace App\Exports;

use App\Account;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AccountExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Account::all();
    }

    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Account #',
            'URL',
            'Street_1',
            'Street_2',
            'City',
            'State',
            'Zip',
            'Phone_1',
            'Phone_2',
            'Fax',
            'Email',
            'Contact Name',
            'Contact Phone_1',
            'Contact Phone_2',
            'Contact Email',
            'Type_id',
            'Company_id',
            'Asset_id',
            'Status_id',
            'Created',
            'Updated'
        ];
    }
}
