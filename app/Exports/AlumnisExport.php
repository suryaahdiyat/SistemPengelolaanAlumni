<?php

namespace App\Exports;

use App\Models\Alumni;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithTitle;

// class AlumnisExport implements FromQuery, WithHeadings
// {
//     use Exportable;

//     protected $tahun;

//     // /**
//     //  * @return array
//     //  */
//     // public function array(): array
//     // {
//     //     return [
//     //         Alumni::all()
//     //     ];
//     // }

//     public function __construct($tahun = null){
//         $this->tahun = $tahun;
//     }

//     /**
//      * @return array
//      */
//     public function headings(): array
//     {
//         return [
//             "id",
//             "nama",
//             "nim",
//             "ipk",
//             "tanggal_lulus",
//             "tahun_lulus",
//         ];
//     }

//     /**
//      * @return Builder|EloquentBuilder|Relation|ScoutBuilder
//      */
//     public function query(){
//         $query = Alumni::query();

//         if($this->tahun){
//             $query->where('tahun_lulus', $this->tahun);
//         }

//         return $query;
//     }
// }

class AlumnisExport implements WithMultipleSheets, ShouldAutoSize
{
    use Exportable;

    protected $query;

    public function __construct($query = null)
    {
        $this->query = $query;
    }

    public function sheets(): array
    {
        $sheets = [];

        if ($this->query) {
            $sheets[] = new AlumnisSheet($this->query);
        } else {
            $alumnis = Alumni::all();
            $tahunLulus = $alumnis->pluck('tahun_lulus')->unique();

            foreach ($tahunLulus as $tahun) {
                $query = Alumni::where('tahun_lulus', $tahun)->get();
                $sheets[] = new AlumnisSheet($query, $tahun);
            }
        }

        return $sheets;
    }
}

class AlumnisSheet implements FromCollection, WithHeadings, WithTitle
{
    protected $data;
    protected $sheetName;

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
            'ID',
            'Nama',
            'NIM',
            'IPK',
            'Tanggal Lulus',
        ];
    }
    /**
     * @return string
     */
    public function title(): string
    {
        return $this->sheetName;
    }
}
