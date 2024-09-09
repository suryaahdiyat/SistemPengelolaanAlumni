<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request('search');
        $alumni = ALumni::latest();

        $query = false;
        if ($search) {
            $alumni = $alumni->where(function ($query) use ($search) {
                $query->where('ipk', 'like', '%' . $search . '%')
                    ->orWhere('tanggal_lulus', 'like', '%' . $search . '%')
                    ->orWhereHas('mahasiswa', function ($query) use ($search) {
                        $query->where('nama', 'like', '%' . $search . '%')
                                ->orWhere('nim', 'like', '%' . $search . '%');
                    });
            });
            $query = true;
        }

        // Lanjutkan dengan paginasi
        $alumni = $alumni->paginate(6);

        return view('alumni.index', [
            'alumni' => $alumni,
            'query' => $query
        ]);

        // return view('alumni.index', [
        //     'alumni' => Alumni::all()
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::check()) return redirect('/login');
        return view('alumni.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) return redirect('/login');
        $validatedData = $request->validate([
            'mahasiswa_id' => 'required',
            'ipk' => 'required|string|max:255',
            'tanggal_lulus' => 'required|string|max:255',
        ]);

        Alumni::create($validatedData);

        return redirect('/alumni')->with('success', 'sukses menambah alumni baru!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumni $alumni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        if (!Auth::check()) return redirect('/login');
        $alumni = Alumni::find($id);
        return view('alumni.edit',[
            'alumni' => $alumni
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        if (!Auth::check()) return redirect('/login');
        $alumni = Alumni::find($id);
        $validatedData = $request->validate([
            'mahasiswa_id' => 'required',
            'ipk' => 'required|string|max:255',
            'tanggal_lulus' => 'required|string|max:255',
        ]);

        $alumni->update($validatedData);

        return redirect('/alumni')->with('success', 'sukses mengubah data alumni!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        if (!Auth::check()) return redirect('/login');
        $alumni = Alumni::find($id);
        $alumni->delete();

        return redirect('/alumni')->with('success', 'sukses menghapus data alumni!');
    }
}
 