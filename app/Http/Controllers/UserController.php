<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email:dns|max:255',
            'password' => 'required|min:4'
        ]);
        // dd($request->all());

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }else{
            return back()->with('loginError', 'Gagal Login');
        }

        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('User.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd('here create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'nama' => 
        // ])
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        dd('here sjhow');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
