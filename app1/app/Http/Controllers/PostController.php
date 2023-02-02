<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //    $post= Post::all();
    //    return view('post.index' ,['posts'=>$post]);

       $post= Post::paginate(5);
       return view('post.index' ,['posts'=>$post]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("post.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>"required|min:3|max:255",
            'discription'=>"required|min:3|max:255"

        ]);

        // post::create($request->all()); or

        post::create([
            'title'=>$request->title,
            'discription'=>$request->discription
        ]);

        $request->session()->flash('alert-success', "Data insert successfully");

        // return redirect()->route('posts.create')->with('alert-success', "Data insert successfully");
        return to_route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        return view('post.show' ,["post"=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        return view('post.edit',["post"=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=Post::find($id);
        $post->update([
            "title"=>$request->title,
            "discription"=>$request->discription
        ]);
        
        return redirect(route('posts.index'))->with('update','update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        return redirect(route('posts.index'))->with('delete','delete successfully');
    }
}
