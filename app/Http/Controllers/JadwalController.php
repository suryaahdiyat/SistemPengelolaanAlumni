<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Mahasiswa;
use App\Models\Stase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request('search');
        $jadwal = Jadwal::latest();

        $query = false;
        if ($search) {
            $jadwal = $jadwal->where(function ($query) use ($search) {
                $query
                    ->whereHas('mahasiswa', function ($query) use ($search) {
                        $query->where('nama', 'like', '%' . $search . '%')
                            ->orWhere('nim', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('stase', function ($query) use ($search) {
                        $query->where('nama_stase', 'like', '%' . $search . '%')
                            ->orWhere('durasi', 'like', '%' . $search . '%');
                    });
            });
            $query = true;
        }

        // Lanjutkan dengan paginasi
        $jadwal = $jadwal->paginate(6);

        return view('jadwal.index', [
            'jadwal' => $jadwal,
            'query' => $query
        ]);

        // return view('jadwal.index',[
        //     'jadwal' => Jadwal::all()
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!Auth::check()) return redirect('/login');
        return view('jadwal.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) return redirect('/login');
        $validatedData = $request->validate([
            'stase_id' => 'required',
            'mahasiswa_id' => 'required'
        ]);

        // $valid['stase_id'] = $validatedData['id_stase'];
        // $valid['mahasiswa_id'] = $validatedData['id_mhs'];
        
        Jadwal::create($validatedData);

        return redirect('/jadwal')->with('success', 'sukses menambah jadwal baru!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jadwal $jadwal)
    {
        if (!Auth::check()) return redirect('/login');
        return view('jadwal.edit',[
            'jadwal' => $jadwal
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        if (!Auth::check()) return redirect('/login');
        $validatedData = $request->validate([
            'id_mhs' => 'required',
            'id_stase' => 'required'
        ]);

        $valid['stase_id'] = $validatedData['id_stase'];
        $valid['mahasiswa_id'] = $validatedData['id_mhs'];

        $jadwal->update($valid);

        return redirect('/jadwal')->with('success', 'sukses merubah data jadwal!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        if (!Auth::check()) return redirect('/login');
        $jadwal->delete();

        return redirect('/jadwal')->with('success', 'sukses menghapus data jadwal!');
    }

    // JadwalController.php
    public function validateMhs(Request $request)
    {
        $nim = $request->nim;
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        if ($mahasiswa) {
            return response()->json([
                'status' => 'success',
                'data' => $mahasiswa
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'NIM tidak ditemukan'
            ]);
        }
    }

    public function validateStase(Request $request)
    {
        $kode_stase = $request->kode_stase;
        $stase = Stase::where('kode_stase', $kode_stase)->first();

        if ($stase) {
            return response()->json([
                'status' => 'success',
                'data' => $stase
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Kode Stase tidak ditemukan'
            ]);
        }
    }

}
