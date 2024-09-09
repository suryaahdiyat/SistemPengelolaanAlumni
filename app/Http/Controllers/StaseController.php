<?php

namespace App\Http\Controllers;

use App\Exports\StaseExport;
use App\Imports\StaseImport;
use App\Models\Stase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaseController extends Controller
{

    public function export()
    {
        if (!Auth::check()) return redirect('/login');
        return (new StaseExport)->download('stase.xlsx');
    }

    public function import(Request $request)
    {
        if (!Auth::check()) return redirect('/login');
        $request->validate(['data_stase' => 'required']);
        (new StaseImport)->import($request->file('data_stase'));
        return redirect('/stase')->with('success', 'berhasil mengimport data');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $search = request('search');
        $stase = Stase::latest();

        $query = false;
        if ($search) {
            $stase = $stase->where(function ($query) use ($search) {
                $query->where('nama_stase', 'like', '%' . $search . '%')
                    ->orWhere('durasi', 'like', '%' . $search . '%');
            });
            $query = true;
        }

        // Lanjutkan dengan paginasi
        $stase = $stase->paginate(6);

        return view('stase.index', [
            'stase' => $stase,
            'query' => $query
        ]);
        // return view('stase.index',[
        //     'stase' => Stase::all()
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::check()) return redirect('/login');
        return view('stase.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) return redirect('/login');
        $validatedData = $request->validate([
            'nama_stase' => 'required|string|max:255',
            'kode_stase' => 'required|string|max:255|unique:stases',
            'durasi' => 'required|string|max:255',
        ]);

        Stase::create($validatedData);

        return redirect('/stase')->with('success', 'sukses menambah stase baru!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stase $stase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stase $stase)
    {
        if (!Auth::check()) return redirect('/login');
        return view('stase.edit',[
            'stase' => $stase
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stase $stase)
    {
        if (!Auth::check()) return redirect('/login');
        $validatedData = $request->validate([
            'nama_stase' => 'required|string|max:255',
            'kode_stase' => 'required|string|max:255|unique:stases,kode_stase,' . $stase->id,
            'durasi' => 'required|string|max:255',
        ]);

        $stase->update($validatedData);

        return redirect('/stase')->with('success', 'sukses mengubah data stase!');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stase $stase)
    {
        if (!Auth::check()) return redirect('/login');
        $stase->delete();
        
        return redirect('/stase')->with('success', 'sukses menghapus data stase!');
        
    }
}
