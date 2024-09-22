<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithTitle;

class MahasiswaExport implements WithMultipleSheets, ShouldAutoSize
{
    use Exportable;

    public function sheets(): array
    {
        $sheets = [];
        $mahasiswa = Mahasiswa::all();
        $angkatan = $mahasiswa->pluck('angkatan')->unique();

        // Membuat sheet untuk setiap tahun lulus yang unik
        foreach ($angkatan as $tahun) {
            $query = Mahasiswa::where('angkatan', $tahun)->get();
            $sheets[] = new MahasiswaSheet($query, $tahun);
        }

        return $sheets;
    }
}

class MahasiswaSheet implements FromCollection, WithHeadings, WithTitle
{
    protected $data;
    protected $sheetName;

    // Tidak perlu menerima query dari luar, cukup data dan nama sheet
    public function __construct($data, $sheetName = 'Data')
    {
        $this->data = $data;
        $this->sheetName = $sheetName;
    }

    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        return [
            'id',
            'Nama',
            'NIM',
            // 'angkatan',
            'kelompok',
        ];
    }

    public function title(): string
    {
        return $this->sheetName;
    }
}
