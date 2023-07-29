<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class CarloDController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('simulasi_monte_carlo.index',[
           'title' => 'Simulasi Monte Carlo',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
    }

    




    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
     
     
    }

    public function ddestroy()
    {
     
     
    }
}
