<?php

namespace App\Imports;

use App\Models\Alumni;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Events\BeforeSheet;

class AlumnisImport implements ToModel, WithHeadingRow, WithEvents
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
        // dd("".$row['ipk']."");
        // Cek apakah data sudah ada berdasarkan email
        // dd($this->sheetName);
        $user = Alumni::where('nim', $row['nim'])->first();

        if ($user) {
            // Jika ada, update data yang sudah ada
            $user->update([
                'nama' => (!empty($row['nama']) ? $row['nama'] : $user->nama),
                'ipk' => "" . (!empty($row['ipk']) ? $row['ipk'] : $user->ipk) . "",
                'tanggal_lulus' => "" . (!empty($row['tanggal_lulus']) ? $row['tanggal_lulus'] : $user->tanggal_lulus) . "",
                // 'tahun_lulus' => "" . (!empty($row['tahun_lulus']) ? $row['tahun_lulus'] : $user->tahun_lulus) . "",
                'tahun_lulus' => $user->tahun_lulus !== $this->sheetName ? $this->sheetName : $user->tahun_lulus,
            ]);
            return null; // Tidak perlu return model karena kita hanya update
        } else {
            // Jika tidak ada, buat user baru
            return new Alumni([
                "nama" => "" . (!empty($row['nama']) ? $row['nama'] : "") . "",
                "user_id" => 1, //aut()->user()->id
                "nim" => "" . (!empty($row['nim']) ? $row['nim'] : "") . "",
                "ipk" => "" . (!empty($row['ipk']) ? $row['ipk'] : "") . "",
                "tanggal_lulus" => "" . (!empty($row['tanggal_lulus']) ? $row['tanggal_lulus'] : "") . "",
                // "tahun_lulus" => "" . (!empty($row['tahun_lulus']) ? $row['tahun_lulus'] : "") . "",
                "tahun_lulus" => $this->sheetName,
            ]);
        }

        
    }

    /**
     * Daftarkan event listener untuk menangkap nama sheet.
     *
     * @return array
     */
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
