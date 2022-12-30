<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelper;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{

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
            'category_id' => 'required',
            'location' => 'required',
            'maps_url' => 'required',
            'image' => ['required', 'mimes:png,jpg,jpeg', 'max:1024'],
            'description' => 'required'
        ]);

        $validatedData['slug']= Str::slug($validatedData['title']);
        $validatedData['image']= ImageHelper::instance()->upload($request->image, 'post-images');

        Post::create($validatedData);
        return redirect('posts')->with('success','Post successfully added...');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('pages.dashboard.post.edit', [
            'title' => 'Edit Post',
            'active' => 'post',
            'post' => $post,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $validatedData = $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'location' => 'required',
            'maps_url' => 'required',
            'image' => [Rule::requiredIf(function () {
                if (empty($this->request->image)) {
                    return false;
                }
                return true;
            }), 'mimes:png,jpg,jpeg', 'max:1024'],
            'description' => 'required'
        ]);

        $validatedData['slug']= Str::slug($validatedData['title']);
        if ($request->image) {
            ImageHelper::instance()->delete($post->image);
            $validatedData['image'] = ImageHelper::instance()->upload($request->image, 'post-images');
        }

        $post->update($validatedData);
        return back()->with('success','Post successfully updated...');
    }

    public function destroy(Request $request)
    {
        $post = Post::find($request->id);
        $post->delete();
        return redirect('posts')->with('success','Posts successfully deleted...');
    }
}
