<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::orderBy('created_at','DESC')->paginate(10);
        return view('pages.dashboard.post.posts', [
            'title' => 'Manajemen Wisata',
            'active' => 'post',
            'posts' => $posts,
            'no' => 1
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('pages.dashboard.post.create', [
            'title' => 'Add Post',
            'active' => 'post',
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'location' => 'required',
            'maps_url' => 'required',
            'image' => 'required',
            'description' => 'required'
        ]);
        
        $validatedData['slug']= Str::slug($validatedData['title']);
        $validatedData['image']= $validatedData['image'];
        
        Post::create($validatedData);
        return redirect('posts')->with('success','Post successfully added...');
    }

    public function edit(Request $request)
    {
        $post = Post::findOrFail($request->id);
        $categories = Category::all();
        return view('pages.dashboard.post.edit', [
            'title' => 'Edit Post',
            'active' => 'post',
            'post' => $post,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request)
    {
        $post = Post::findOrFail($request->id);
        $validatedData = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'location' => 'required',
            'maps_url' => 'required',
            'image' => 'required',
            'description' => 'required'
        ]);
        
        $validatedData['slug']= Str::slug($validatedData['title']);
        $validatedData['image']= $validatedData['image'];

        $post->update($validatedData);
        return redirect('posts')->with('success','Post successfully updated...');
    }

    public function destroy(Request $request)
    {
        $post = Post::find($request->id);
        $post->delete();
        return redirect('posts')->with('success','Posts successfully deleted...');
    }
}
