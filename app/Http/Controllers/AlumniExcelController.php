<?php

namespace App\Http\Controllers;

use App\Exports\AlumnisExport;
use App\Imports\AlumnisImport;
use App\Models\Alumni;
use Illuminate\Http\Request;

class AlumniExcelController extends Controller
{
	public function exports()
	{
		// if (request()->query('tahun')) {
		//     return (new AlumnisExport(request()->query('tahun')))->download('alumnis_' . request()->query('tahun') . '.xlsx');
		// } else {
		//     return (new AlumnisExport())->download('alumnis.xlsx');
		// }
		$tahun_lulus = request()->query('tahun');
		$query = null;

		if ($tahun_lulus) {
			$query = Alumni::where('tahun_lulus', $tahun_lulus)->get();
		}

		$filename = $tahun_lulus ? "alumni_$tahun_lulus.xlsx" : "alumni.xlsx";

		return (new AlumnisExport($query))->download($filename);
	}

	public function imports(Request $request)
	{
		(new AlumnisImport)->import($request->file('alumnis'));
		return redirect()->back()->with('success', 'berhasil mengimport data');
	}
}
