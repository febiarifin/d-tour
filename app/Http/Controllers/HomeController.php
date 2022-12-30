<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        $posts = Post::paginate(6);

        return view('pages.home.home', [
            'title' => config('app.name'),
            'posts' => $posts,
            'categories' => $categories
        ]);
    }

    public function postByCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $posts = Post::where('category_id', $category->id)->paginate(6);
        $categories = Category::all();

        return view('pages.home.postByCategory', [
            'title' => 'Kategori | ' . $category->name,
            'posts' => $posts,
            'category' => $category,
            'categories' => $categories,
        ]);
    }

    public function search(Request $request)
    {
        $posts = Post::select("*")
            ->where('title', 'LIKE', '%' . $request->name . '%')
            ->orWhere('location', 'LIKE', '%' . $request->location . '%')
            ->orWhere('category_id', '=', $request->category)
            ->get();

        $categories = Category::all();

        return view('pages.home.postSearch', [
            'title' => 'Pencarian Tempat Wisata',
            'posts' => $posts,
            'categories' => $categories,
        ]);
    }

    public function postDetail($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $categories = Category::all();

        return view('pages.home.postDetail',[
            'title' => $post->title,
            'post' => $post,
            'categories' => $categories,
        ]);
    }
}
