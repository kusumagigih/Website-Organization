<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class AdminKontakController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Kontak::orderByDesc('id')->get();
        return view('admin.kontak.index', [
            'list' => $list,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kontak.edit', [
            'kontak' => (object) [
                'id' => 0,
                'nomer' => '',
                'linkwa' => '',
                'email' => '',
                'sekret' => '',
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nomer' => 'required',
            'linkwa' => 'required',
            'email' => 'required',
            'sekret' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('kontakk.create')->withErrors($validator)->withInput($request->all());
        } else {
            $kontakk = new Kontak();
            $kontakk->fill($request->all());
            $kontakk->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $kontakk->nomer)));
            $kontakk->kontak_id = Auth::id();
            $kontakk->save();

            Session::flash('message', 'Successfully published Data Diri Kader!');
            return redirect()->route('kontakk.index');
        }
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
    public function edit(Kontak $kontakk)
    {
        return view('admin.kontak.edit', [
            'kontak' => $kontakk,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kontak $kontakk)
    {
        $rules = [
            'nomer' => 'required',
            'linkwa' => 'required',
            'email' => 'required',
            'sekret' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->route('kontakk.edit', $kontakk->id)
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            $data = $request->all();
        }
        $kontakk->update($data);

        Session::flash('message', 'Successfully updated Data Diri Kader!');
        return redirect()->route('kontakk.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kontak $kontakk)
    {
        Kontak::where('id', $kontakk->id)->delete();
        return redirect()->route('kontakk.index');
    }
}
