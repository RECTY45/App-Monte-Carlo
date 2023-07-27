<?php

namespace App\Http\Controllers;

use App\Models\CarloD;
use App\Models\CarloPD;
use Exception;
use Illuminate\Http\Request;

class CarloDController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allData = CarloD::all();
    // Inisialisasi variabel untuk menyimpan total frekuensi permintaan
    $totalFrekuensi = 0;

    // Iterasi setiap data dan menjumlahkan frekuensi_permintaan
    foreach ($allData as $data) {
    $totalFrekuensi += $data->frekuensi_permintaan;
    }
        return view('distribusi.index',[
           'title' => 'Simulasi Carlo | Distribusi',
           'items' => $allData,
           'jumlah' => $totalFrekuensi,
           'itemsData' => CarloPD::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('distribusi.create',[
            'title' => 'Simulasi Carlo | Distribusi-Create',
            
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ValidateData = $request->validate([
            'permintaan_hari' => ['required'],
            'frekuensi_permintaan' => ['required'],
        ]);

        
     try {
        CarloD::create($ValidateData);
     } catch (Exception $e) {
        return back()->with('Data Gagal Di Tambhakan');
     }
        return redirect(route('distribusi.index'))->with('success', 'Data simulasi berhasil disimpan.');
    
    }

    public function dcreate()
    {
     
        $totalFrekuensi = 0;
        $allData = CarloD::all();
    // Iterasi setiap data dan menjumlahkan frekuensi_permintaan
    foreach ($allData as $data) {
    $totalFrekuensi += $data->frekuensi_permintaan;
    }
        return view('distribusi.Dcreate',[
            'title' => 'Simulasi Carlo',
            'items' => $allData,
            'itemData' => CarloPD::all(),
            'jumlah' => $totalFrekuensi
        ]);

     }
    

    public function dstore(Request $request)
    {
        $validatedData = $request->validate([
            'distribusi_densitas' => ['required'],
            'distribusi_komulatif' => ['required'],
            'tag_number' => ['required']
        ]);
    
        try {
            // Buat dan simpan data ke dalam database menggunakan model CarloPD
            CarloPD::create($validatedData);
    
            // Redirect dengan pesan sukses jika berhasil disimpan
            return redirect(route('distribusi.index'))->with('success', 'Data simulasi berhasil disimpan.');
        } catch (Exception $e) {
            // Redirect dengan pesan gagal jika ada masalah dalam menyimpan data
            return back()->with('error', 'Data Gagal Di Tambahkan');
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(CarloD $carloD)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CarloD $carloD)
    {
        return view('distribusi.update',[
            'title' => 'Simulasi CARLO | Distribusi-Update'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CarloD $carloD)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarloD $carloD)
    {
        $carloD->delete();
        return back()->with('success', 'Data berhasil di hapus');
     
    }

    public function ddestroy(CarloPD $carloPD)
    {
        $carloPD->delete();
        return back()->with('success', 'Data berhasil di hapus');
     
    }
}
