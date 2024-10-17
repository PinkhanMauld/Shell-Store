<?php

namespace App\Http\Controllers;

use App\Models\fuel;
use Illuminate\Http\Request;

class DataFuelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $fuels = Fuel::where('type', 'LIKE', '%'.$request->cari.'%')->simplePaginate(5)->appends($request->all());
        return view('fuel.data_fuel', compact('fuels')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fuel.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable',
            'type' => 'required',
            'price' => 'required',
            'stock' => 'required'
        ]);
        $proses = Fuel::create([
           
            'type'=> $request -> type,
            'price'=> $request -> price,
            'stock'=> $request -> stock,
        ]);
        if($proses) { return redirect()->route('data_fuel.data')->with('success', 'Berhasil Menambah Data BEnsin!');
        } else {return redirect()->back()->with('failed', 'Gagal Menambah Data Bensin!');}
       

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
        $fuel = Fuel::where('id', $id)->first();
        return view('fuel.edit', compact('fuel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'nullable',
            'type' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);
        Fuel::where('id', $id)->update([
            
            'type' => $request->type,
            'price' => $request->price,
            'stock' => $request->stock,  
        ]);
        return redirect()->route('data_fuel.data')->with('success', 'Berhasil Menambah Data Bensin!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Fuel::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Data Bahan Bakar!');
    
    }
}
