<?php

namespace App\Http\Controllers;

use App\Exports\MahasiswaExport;
use App\Imports\MahasiswaImport;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\alert;

class MahasiswaController extends Controller
{

    public function export(){
        if (!Auth::check()) return redirect('/login');
        return (new MahasiswaExport())->download('mahasiswa.xlsx');
    }

    public function import(Request $request)
    {
        if (!Auth::check()) return redirect('/login');
        $request->validate(['data_mhs' => 'required']);
        (new MahasiswaImport)->import($request->file('data_mhs'));
        return redirect('/mahasiswa')->with('success', 'berhasil mengimport data');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request('search');
        $mhs = Mahasiswa::latest();

        $query = false;
        if ($search) {
            $mhs = $mhs->where(function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%')
                ->orWhere('nim', 'like', '%' . $search . '%')
                ->orWhere('angkatan', 'like', '%' . $search . '%');
            });
            $query = true;
        }

        // Lanjutkan dengan paginasi
        $mhs = $mhs->paginate(6);

        return view('mahasiswa.index', [
                'mhs' => $mhs,
                'query' => $query
            ]);

        // return view('Alumni.index',[
        //     "alumni" => Alumni::latest()->paginate(6)
        // ]);

        // return view('mahasiswa.index',[
        //     'mhs' => Mahasiswa::all()
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::check()) return redirect('/login');
        return view('mahasiswa.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) return redirect('/login');
        // dd($request->all());
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:255|unique:mahasiswas',
            'angkatan' => 'required|string|max:255',
            'kelompok' => 'required|string|max:255',
        ]);

        Mahasiswa::create($validatedData);

        return redirect('/mahasiswa')->with('success', 'sukses menambah mahasiswa baru!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        if (!Auth::check()) return redirect('/login');
        return view('mahasiswa.edit',[
            'mhs' => $mahasiswa
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        if (!Auth::check()) return redirect('/login');
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:255|unique:mahasiswas,nim,'. $mahasiswa->id,
            'angkatan' => 'required|string|max:255',
            'kelompok' => 'required|string|max:255',
        ]);
        
        $mahasiswa->update($validatedData);

        return redirect('/mahasiswa')->with('success', 'sukses mengubah data mahasiswa!');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        if (!Auth::check()) return redirect('/login');
        $mahasiswa->delete();
        
        return redirect('/mahasiswa')->with('success', 'sukses menghapus data mahasiswa!');
    }
}
