<?php

namespace App\Exports;

use App\Models\Stase;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StaseExport implements FromCollection, WithHeadings
{

    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Stase::all();
    }

    /**
     * @return array
     */
    public function headings(): array{
        return [
            'Nama Stase',
            'Kode Stase',
            'Durasi',
        ];
    }
}
