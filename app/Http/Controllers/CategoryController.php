<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
            'name' => 'required|unique:categories|max:10',
            'image' => 'required'
        ], [
            'name.unique' => 'This category is already been created',
            'name.required' => 'Category name is required',
        ]);

        
        $name = null;
        if($request->has('image')){
            $image = $request->image;
            $name = time().$image->getClientOriginalName();
            $image->move('images' , $name);
        }
    
        $category = Category::create([
			'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => 'images/' . $name,
		]);


        if($category){
            return redirect(route('admin.category.index'))->with('message','Category added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = Category::find($id);
        return view('admin.categories.edit' , compact('category'));

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
        $category = Category::find($id);

        $name = null;
        if($request->has('image')){
            $image = $request->image;
            $name = time().$image->getClientOriginalName();
            $image->move('images' , $name);
            $category->image = 'images/'.$name;
        }

        $category->name = $request->name;
        $category->save();

        return redirect(route('admin.category.index'))->with('message' , 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $category = Category::find($id);
        
        $category->delete();
        return redirect(route('admin.category.index'))->with('message' , 'Category Deleted Successfully');

    }
}