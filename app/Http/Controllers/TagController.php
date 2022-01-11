<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{

    public function index()
    {
        $tag = Tag::all();
//        $mytag = $tag->where('id', Auth::id())->get();
        return view('tags.index' , compact('tag'));
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'tag' => 'required',
        ]);
         Tag::create([
           'tag' => $request->tag,
        ]);
        return redirect()->back()->with('success' , 'created successfully');
    }

    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('tags.edit' , compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);
        $this->validate($request,[
            'tag' => 'required',
        ]);
        $tag->tag = $request->tag;
        $tag->save();
        return redirect(route('tags.index'))->with( 'success' , 'updated successfully' );
    }

    public function destroy($id)
    {
         Tag::findOrFail($id)->destroy($id);
        return redirect()->back()->with( 'success' , 'deleted successfully' );
    }
}
