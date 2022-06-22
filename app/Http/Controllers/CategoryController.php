<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $categories= Category::paginate(10);
        return view('pages.dashboard.category.categories',[
            'title'=>'Manajemen kategori',
            'active'=> 'category',
            'categories'=>$categories,
            'no'=>1,
            'form'=>'categoryAdd',
            'button'=> 'Add',
            'categoryId' => '',
            'categoryName'=>'',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData= $request->validate([
            'name'=>['required','unique:categories']
        ]);
        
        $validatedData['slug'] = Str::slug($validatedData['name']);
        Category::create($validatedData);
        return redirect('categories')->with('success','Category successfully added...');
    }

    public function edit(Request $request)
    {
        $categories= Category::paginate(5);
        return view('pages.dashboard.category.categories',[
            'title'=>'Manajemen kategori',
            'active'=> 'category',
            'categories'=>$categories,
            'no'=>1,
            'form'=>'categoryUpdate',
            'categoryId' => $request->id,
            'categoryName'=>$request->name,
            'button'=>'Save'
        ]);
    }

    public function update(Request $request)
    {
        $category= Category::findOrFail($request->id);

        $validatedData = $request->validate([
            'name'=>['required','unique:categories']
        ]);

        $validatedData['name']= $validatedData['name'];
        $validatedData['slug']= Str::slug($validatedData['name']);

        DB::table('posts')->where('category',$category->name)->update(['category'=>$validatedData['name']]);
        $category->update($validatedData);
        return redirect('categories')->with('success','Category successfully updated...');
    }

    public function destroy(Request $request)
    {
        $category = Category::find($request->id);
        $category->delete();
        return redirect('categories')->with('success','Category successfully deleted...');
    }
}
