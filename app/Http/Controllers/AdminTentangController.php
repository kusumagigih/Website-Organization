<?php

namespace App\Http\Controllers;

use App\Models\Tentang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class AdminTentangController extends Controller
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
        $list = Tentang::orderByDesc('id')->get();
        return view('admin.tentang.index', [
            'list' => $list
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tentang.edit', [
            'tentang' => (object)([
                'id' => 0,
                'nama' => '',
                'kaderisasi' => '',
                'image' => null
            ])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = array(
            'nama'     => 'required',
            'image'     => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'kaderisasi'   => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect()->route('tentangg.create')
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            // handle image
            // $path = $request->file('image')->storePublicly('images');
            $destinationPath = 'images';
            $myimage = date('Y-m-d') . $request->image->getClientOriginalName();
            $request->image->move(public_path($destinationPath), $myimage);

            // store

            $tentangg = new Tentang();
            $tentangg->fill($request->all());
            $tentangg->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $tentangg->nama)));
            $tentangg->tentang_id = Auth::id();
            $tentangg->image = '/' . $myimage;
            $tentangg->save();

            Session::flash('message', 'Successfully published Data Diri Kader!');
            return redirect()->route('tentangg.index');
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
    public function edit(Tentang $tentangg)
    {
        return view('admin.tentang.edit', [
            'tentang' => $tentangg
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tentang $tentangg)
    {
        $rules = array(
            'nama'       => 'required',
            'kaderisasi'      => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect()->route('tentangg.edit', $tentangg->id)
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            // store
            // $path = $request->file('image')->storePublicly('images');

            $data = $request->all();
            // dd($data);
            if (empty($data['image'])) {
                unset($data['image']);
            } else {
                $destinationPath = 'images';
                File::delete(public_path("images/" . $tentangg->image));
                $myimage = date('Y-m-d') . $request->image->getClientOriginalName();
                $request->image->move(public_path($destinationPath), $myimage);
                $data['image'] = '/' . $myimage;
            }
            $tentangg->update($data);

            Session::flash('message', 'Successfully updated Data Diri Kader!');
            return redirect()->route('tentangg.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tentang $tentangg)
    {
        File::delete(public_path("images/" . $tentangg->image));
        Tentang::where('id', $tentangg->id)->delete();
        return redirect()->route('tentangg.index');
    }
}
