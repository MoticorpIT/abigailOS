<?php

namespace App\Exports;

use App\Tenant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TenantExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tenant::all();
    }

    public function headings(): array
    {
        return [
            '#',
            'First Name',
            'Last Name',
            'Phone_1',
            'Phone_2',
            'Fax',
            'Email',
            'Co_first_name',
            'Co_last_name',
            'Co_phone_1',
            'Co_phone_2',
            'Co_email',
            'Street_1',
            'Street_2',
            'City',
            'State',
            'Zip',
            'Account_standing_id',
            'Status_id',
            'Created',
            'Updated'
        ];
    }
}
