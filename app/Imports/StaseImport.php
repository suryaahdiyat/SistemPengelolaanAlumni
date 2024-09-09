<?php

namespace App\Imports;

use App\Models\Stase;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StaseImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    use Importable;

    public function model(array $row)
    {
        // dd($row['nama_stase']);
        $stase = Stase::where('kode_stase', $row['kode_stase'])->first();

        if ($stase) {
            // Jika ada, update data yang sudah ada
            $stase->update([
                'nama_stase' => (!empty($row['nama_stase']) ? $row['nama_stase'] : $stase->nama_stase),
                'durasi' => (!empty($row['durasi']) ? $row['durasi'] : $stase->durasi),
            ]);
            return null; // Tidak perlu return model karena kita hanya update
        } else {
            // Jika tidak ada, buat stase baru
            return new Stase([
                "nama_stase" => "" . (!empty($row['nama_stase']) ? $row['nama_stase'] : "") . "",
                "kode_stase" => "" . (!empty($row['kode_stase']) ? $row['kode_stase'] : "") . "",
                'durasi' => (!empty($row['durasi']) ? $row['durasi'] : $stase->durasi),
            ]);
        }
    }

    public function headingRow(): int
    {
        return 1;
    }
}
