<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Events\BeforeSheet;

class MahasiswaImport implements ToModel, WithHeadingRow, WithEvents
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    private $sheetName;

    use Importable;

    public function model(array $row)
    {
        // dd($row['nama']);
        $mhs = Mahasiswa::where('nim', $row['nim'])->first();

        if ($mhs) {
            // Jika ada, update data yang sudah ada
            $mhs->update([
                'nama' => (!empty($row['nama']) ? $row['nama'] : $mhs->nama),
                'kelompok' => (!empty($row['kelompok']) ? $row['kelompok'] : $mhs->kelompok),
                'angkatan' => $mhs->angkatan !== $this->sheetName ? $this->sheetName : $mhs->angkatan,
            ]);
            return null; // Tidak perlu return model karena kita hanya update
        } else {
            // Jika tidak ada, buat mhs baru
            return new Mahasiswa([
                "nama" => "" . (!empty($row['nama']) ? $row['nama'] : "") . "",
                "nim" => "" . (!empty($row['nim']) ? $row['nim'] : "") . "",
                'kelompok' => (!empty($row['kelompok']) ? $row['kelompok'] : $mhs->kelompok),
                'angkatan' => $this->sheetName,
            ]);
        }
    }
    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                // Simpan nama sheet ke dalam properti class
                $this->sheetName = $event->getSheet()->getTitle();
            },
        ];
    }

    public function headingRow(): int
    {
        return 1;
    }
}
