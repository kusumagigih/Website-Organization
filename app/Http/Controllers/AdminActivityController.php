<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class AdminActivityController extends Controller
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
        $list = Activity::orderByDesc('id')->get();
        return view('admin.activity.index', [
            'list' => $list
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.activity.edit', [
            'activity' => (object)([
                'id' => 0,
                'title' => '',
                'content' => '',
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
            'title'     => 'required',
            'image'     => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'content'   => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect()->route('activiti.create')
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            // handle image
            // $path = $request->file('image')->storePublicly('images');
            $destinationPath = 'images';
            $myimage = date('Y-m-d') . $request->image->getClientOriginalName();
            $request->image->move(public_path($destinationPath), $myimage);

            // store

            $activiti = new Activity();
            $activiti->fill($request->all());
            $activiti->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $activiti->title)));
            $activiti->activity_id = Auth::id();
            $activiti->image = '/' . $myimage;
            $activiti->save();

            Session::flash('message', 'Successfully published activity!');
            return redirect()->route('activiti.index');
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
    public function edit(Activity $activiti)
    {
        return view('admin.activity.edit', [
            'activity' => $activiti
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        $rules = array(
            'title'       => 'required',
            'content'      => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect()->route('activiti.edit', $activity->id)
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
                File::delete(public_path("images/" . $activity->image));
                $myimage = date('Y-m-d') . $request->image->getClientOriginalName();
                $request->image->move(public_path($destinationPath), $myimage);
                $data['image'] = '/' . $myimage;
            }
            $activity->update($data);

            Session::flash('message', 'Successfully updated activity!');
            return redirect()->route('activiti.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activiti)
    {
        File::delete(public_path("images/" . $activiti->image));
        Activity::where('id', $activiti->id)->delete();
        return redirect()->route('activiti.index');
    }
}
