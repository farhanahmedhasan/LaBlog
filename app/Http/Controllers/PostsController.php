<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
       $posts =  Post::orderBy('updated_at', 'desc')->paginate(20);

        return view('posts.index', ['posts'=> $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {

        Post::create([
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'min_to_read' => $request->min_to_read,
            'image_path' => $request->file('image_path')->store('images'),
            'is_published' => $request->is_published === 'on',
        ]);

        return redirect(route('posts.index'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function edit($id)
    {
        return view('posts.edit',[
            'post' => Post::where('id', $id)->first()
        ]);
    }

    public function update(PostRequest $request, int $id)
    {   

        $post = Post::where('id',$id);
    
        $post->update([
            ...$request->except(['_token', '_method']),
            'is_published' => $request->is_published === 'on',
        ]);

        if($request->has('image_path')){
            $post->update([
                'image_path' => $request->file('image_path')->store('images'),
            ]);
        }

        return redirect(route('posts.show', $id));
    }

    public function destroy($id)
    {
        Post::destroy($id);

        return redirect(route('posts.index'))->with('message', 'Post has been deleted');
    }
}
