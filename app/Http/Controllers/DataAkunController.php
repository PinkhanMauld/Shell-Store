<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class DataAkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // return view('pages.data_akun');
        $users = User::where('name', 'LIKE', '%'.$request->cari.'%')->simplePaginate(5)->appends($request->all());
        return view('pages.data_akun', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);
        $proses = User::create([
            'name' => $request -> name,
            'email'=> $request -> email,
            'password'=> Hash::make($request->password),
            'role'=> $request -> role,
        ]);

        if($proses) { return redirect()->route('data_akun.index')->with('success', 'Berhasil Menambah Data Akun!');
        } else {return redirect()->back()->with('failed', 'Gagal Menambah Data Akun!');}
       

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::find($id);
        return view('pages.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        $proses = User::where('id', $id)->update([
            'name' => $request -> name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,  
        ]);

        if($proses) { return redirect()->route('data_akun.index')->with('success', 'Berhasil Mengubah Data Akun!');
        } else {return redirect()->back()->with('failed', 'Gagal Mengubah Data Akun!');}
       

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Data Akun!');
    }
}
