<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromArray, WithHeadings {

    use Exportable;

    /**
     * @return array
     */
    public function array(): array{
        return [
            User::all()
        ];
    }

    /**
     * @return array
     */
    public function headings(): array {
        return [
            "id",
            "nama",
            "role",
            "email",
            "password",
            "created_at",
        ];
    }
}
