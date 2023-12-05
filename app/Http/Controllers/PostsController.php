<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function __construct()
     {
        $this->middleware('auth')->only(['create', 'edit', 'upade', 'destroy']);
     }

    public function index()
    {
        $posts = Post::orderBy('updated_at', 'desc')->paginate(3);
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validating->Request
        $validated = $request->validate([
           'title' => 'required|unique:posts',
           'body' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);

        $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();

        //location to store the image file uploaded
        $request->image->move(public_path('images'), $newImageName);

        $post = Post::Create([

            'title' => $request->title,
            'body'  => $request->body,
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id

        ]);
         return redirect('/posts')->with('status', 'post successfully created!');
    }


   /* public function createComment()
    {
        return view('posts.show');
    }*/

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('posts.show', [
            'post' => Post::findorFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        //Validating Post to be UPdated........
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        //Updating Post......
        $post = Post::where('id', $id)->update([
            'title'=> $request->title,
            'body' => $request->body,
            'user_id' => auth()->user()->id
        ]);

        return redirect('/posts')->with('status', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id)->first();
        $post->delete();

        return redirect('/posts')->with('delete', 'Post deleted successfully!');
    }


    public function saveComment(Request $request, Post $post)
    {
        //validating->request..................
        $request->validate([
            'name' => 'required',
            'comment' => 'required'

        ]);

        /*$post->comments()->create([
            'name' => $request->name,
            'comment' => $request->comment,
            'post_id' => (int)$request->input('post_id')
       ]);*/

       $comment = new Comment();

       $comment->name = $request->input('name');
       $comment->comment = $request->input('comment');
       $comment->post_id = (int)$request->input('post_id');
       //dd($comment);
       $comment->save();

        return redirect()->back()->with('success', 'comment successfully posted');
    }

    public function usershow(string $id) {
        return view('posts.usershow', [
            'post' => Post::findorfail($id)
        ]);
    }

    public function postindex() {
        return view('posts.postindex');
    }

}
