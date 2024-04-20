<?php

namespace App\Http\Controllers;

use App\Models\Tentang;
use Illuminate\Http\Request;

class TentangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Tentang::orderByDesc('id')->get();
        return view('tentang.index', compact("list"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tentang $tentang)
    {
        return view('tentang.show', compact("tentang"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tentang $tentang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tentang $tentang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tentang $tentang)
    {
        //
    }
}
