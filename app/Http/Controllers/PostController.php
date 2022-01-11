<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function __construct(){   // عشان احمي ان مش اي حد يقدر يخش علي الا م يسجل الاول
        $this->middleware('auth');
    }

    public function index()
    {
        $user =  Auth::user();
//        $post = Post::all();

        // for Authorization
        $post = Post::where('user_id', $user->id)->orderBy('updated_at' , 'DESC')->paginate(4);
        return view('posts.index' , ['post' =>$post]);
    }

    public function postsTrashed()
    {
//        $posts = Post::onlyTrashed()->get();

        // for Authorization
        $posts = Post::onlyTrashed()->where('user_id', Auth::id())->get();
        return view('posts.trashed')->with('posts',$posts);
    }

    public function create()
    {
        $tags = Tag::all();
        if($tags->count() == 0){   // لازم يكون ف tag الاول لو مفيش روح كريته الاول وبعد كدا تعال كريت ال post
           return redirect(route('tags.create'));
        }
        return view('posts.create' , compact('tags'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'  => 'required',  // title => this is in field input name
            'tags'  => 'required',
            'description'=> 'required',
            'photo'  => 'required | image',
        ]);
        $photo = $request->photo;
        $newPhoto = time().$photo->getClientOriginalName(); // getClientOriginalName بيفصلي ام الصوره عن الامتداد بتاعها
        $photo->move('uploads/posts', $newPhoto);

//        Post::create($request->all());
        $post = Post::create([  // دول اسامي الاعمده
                    'user_id'     => Auth::id(),
                    'title'       => $request->title,
                    'description' => $request->description,
                    'photo'       => 'uploads/posts/'.$newPhoto,  // حطلي فالفوتو مسار الصوره اللي انا غيرت ف اسمها
                    'slug'        => Str::slug($request->title),
                    ]);

         $post->tags()->attach($request->tags);

        return redirect()->back()->with('success' , 'created successfully');
    }

    public function show(Post $post)
    {
//        $postt = Post::where('user_id', Auth::id())->first();
//        if($postt === null){
//            return redirect()->back();
//        }
        return view('posts.show')->with('post' , $post);
    }

    public function edit($id)
    {
        $tags = Tag::all();
        // عشان امنعه يدخل يعدل علي بوست حد تاني سواء بال url او غيره
        $post = Post::where('id' , $id)->where('user_id', Auth::id())->first(); // لازم تكتب first عشان تشتغل
        if($post === null){
            return redirect()->back();
        }
        return view('posts/edit' , compact('post' , 'tags'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $this->validate($request,[
            'title'      => 'required',
            'description'=> 'required',
            'photo'      => 'required | image',
        ]);
        // بيعمل validate تاني هنا اي تحقق
        if($request->has('photo')){
            $photo    = $request->photo;
            $newPhoto = time().$photo->getClientOriginalName();
            $photo->move('uploads/posts', $newPhoto);  // انقلي الصوره دي للمسار دا وحطلي فيه الصوره دي
            $post->photo = 'uploads/posts/'.$newPhoto;
        }
        $post->title       = $request->title;
        $post->description = $request->description;
        $post->save();

        $post->tags()->sync($request->tags);

       return redirect()->route('posts.index')->with( 'success' , 'updated successfully' );
    }

    public function softDelete($id)
    {
//        Post::where('id' , $id)->delete();

        // for Authorization
        $post = Post::where('id' , $id)->where('user_id', Auth::id())->first();
        if($post === null){
            return redirect()->back();
        }
        $post->delete($id);
        return redirect()->route('posts.index')->with( 'success' , 'Soft deleted successfully' );
    }
    public function hdelete($id)
    {
//         Post::onlyTrashed()->where('id', $id)->first()->forceDelete();

        // for Authorization
        $post = Post::onlyTrashed()->where('id' , $id)->where('user_id', Auth::id())->first();
        if($post === null){
            return redirect()->back();
        }
        $post->forceDelete($id);
        return redirect()->back()->with( 'success' , ' Hard deleted successfully' );
    }
    public function restore($id)
    {
//       Post::onlyTrashed()->where('id' , $id)->first()->restore();

        // for Authorization
        $post = Post::onlyTrashed()->where('id' , $id)->where('user_id', Auth::id())->first();
        if($post === null){
            return redirect()->back();
        }
        $post->restore($id);
        return redirect()->back()->with( 'success' , ' restored successfully' );
    }

}
