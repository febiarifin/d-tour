<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Models\History;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function postsRandom()
    {
        $posts = Post::inRandomOrder()->limit(5)->get();
        return $posts;
    }

    public function posts()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();
        return $posts;
    }

    public function categories()
    {
        $categories = Category::all();
        return $categories;
    }

    public function postByCategory($category)
    {
        $posts = Post::where('category', $category)->orderBy('created_at', 'DESC')->get();
        return $posts;
    }

    public function postByTitle($title)
    {
        $posts = Post::where('title', 'LIKE', '%' . $title . '%')->orderBy('created_at', 'DESC')->get();
        return $posts;
    }

    public function histories($user)
    {
        $histories = History::where('user', $user)->orderBy('created_at', 'DESC')->get();
        return $histories;
    }

    public function historyStore(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'id' => 'required',
                'title' => 'required',
                'category' => 'required',
                'location' => 'required',
                'maps_url' => 'required',
                'image' => 'required',
                'description' => 'required',
                'user' => 'required'
            ]);

            History::create($validatedData);
            return response()->json(['message' => 'History successfully added']);
        } catch (\Throwable $th) {
            return response()->json([]);
        }
    }

    public function historyDestroy(Request $request)
    {
        $histories = History::where('user', $request->user)->delete();
        if ($histories) {
            return response()->json(['message' => 'Hisstory successfully deleted'], 201);
        }
        return response()->json([], 201);
    }

    public function register(Request $request)
    {
        try{
            $validatedData = $request->validate([
                'name' => 'required',
                'username' => ['required', 'min:3', 'max:255', 'unique:users'],
                'email' => 'required|email:dns|unique:users',
                'password' => 'required|min:5|max:255',
                'address' => 'required'
            ]);
            $validatedData['password'] = Hash::make($validatedData['password']);
            $validatedData['role'] = 'user';
    
            User::create($validatedData);
    
            return response()->json(['message', 'register successfully'], 201);
        }catch (\Throwable $th) {
            return response()->json([]);
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            return response()->json(['message' => 'Login successfully'], 201);
        }

        return response()->json(['message' => 'Login failed'], 201);
    }
}
