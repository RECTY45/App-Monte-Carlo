<?php

namespace App\Http\Controllers;

use App\Models\CarloR;
use App\Models\CarloD;
use Exception;
use Illuminate\Http\Request;

class CarloRController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $count = CarloD::count();
        return view('prediksi.index',[
            'title' => 'Simulasi Carlo | Prediksi',
            'items' => CarloR::all(),
            'count' =>$count
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('prediksi.create',[
            'title' => 'Simulasi Calor | Prediksi-Create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ValidateData= $request->validate([
            'nilai_random' => ['required'],
            'hasil_kali' => ['required'],
            'jumlah_pesan_moring' => ['required']
        ]);

        try{
            CarloR::create($ValidateData);
        }catch(Exception $e){
            return back()->with('error','Data Gagal Di Tambah');
        }
        return redirect(@route('prediksi.index'))->with('success','Data Berhasil Di Tambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(CarloR $carloR)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CarloR $carloR)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CarloR $carloR)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarloR $carloR)
    {
        $carloR->delete();
        return back()->with('success','Data Berhasil Di Hapus');
    }
}