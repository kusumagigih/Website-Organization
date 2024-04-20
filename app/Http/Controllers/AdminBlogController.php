<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class AdminBlogController extends Controller
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
        $list = Blog::orderByDesc('id')->get();
        return view('admin.blogs.index', [
            'list' => $list
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogs.edit', [
            'blog' => (object)([
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
            return redirect()->route('blog.create')
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            // handle image
            // $path = $request->file('image')->storePublicly('images');
            $destinationPath = 'images';
            $myimage = date('Y-m-d').$request->image->getClientOriginalName();
            $request->image->move(public_path($destinationPath), $myimage);

            // store

            $blog = new Blog();
            $blog->fill($request->all());
            $blog->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $blog->title)));
            $blog->author_id = Auth::id();
            $blog->image = '/' . $myimage;
            $blog->save();

            Session::flash('message', 'Successfully published blog!');
            return redirect()->route('blog.index');
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
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', [
            'blog' => $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $rules = array(
            'title'       => 'required',
            'content'      => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect()->route('blog.edit', $blog->id)
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
                File::delete(public_path("images/".$blog->image));
                $myimage = date('Y-m-d').$request->image->getClientOriginalName();
                $request->image->move(public_path($destinationPath), $myimage);
                $data['image'] = '/' . $myimage;
            }
            $blog->update($data);

            Session::flash('message', 'Successfully updated blog!');
            return redirect()->route('blog.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        File::delete(public_path("images/".$blog->image));
        Blog::where('id', $blog->id)->delete();
        return redirect()->route('blog.index');
    }
}
