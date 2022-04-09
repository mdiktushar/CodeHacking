<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// model
use App\Models\User;
use App\Models\Role;
use App\Models\Photo;
use App\Models\Post;
use App\Models\Category;

class AdminMediaController extends Controller
{
    //
    public function index(Type $var = null)
    {
        # code...
        $photos = Photo::all();
        return view('admin.media.index', compact('photos'));
    }

    public function create(Type $var = null)
    {
        # code...
        return view('admin.media.create');
    }

    public function store(Request $request)
    {
        # code...
        $file = $request->file('file');
        $name = time().$file->getClientOriginalName();
        $file->move('image', $name);
        Photo::create(['file'=>$name]);
    }

    public function destroy($id)
    {
        # code...
        $photo = Photo::findOrFail($id);
        unlink(public_path(). $photo->file);
        $photo->delete();
        return redirect('admin/media');
    }

    public function show($id)
    {
        # code...
        $photo = Photo::findOrFail($id);
        return view('admin.media.show', compact('photo'));
    }
}
