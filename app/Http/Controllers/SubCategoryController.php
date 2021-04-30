<?php

namespace App\Http\Controllers;

use App\Subcategory;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Subcategory::all();
        return view('admin.subcategories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategories.create',compact('categories'));
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
            'name' => 'required|unique:subcategories|max:10',
            'category_id' => 'required'
        ], [
            'name.unique' => 'This sub category is already been created',
            'name.required' => 'Sub Category name is required',
        ]);
    
        $subcategory = Subcategory::create([
			'name' => $request->name,
            'slug' => Str::slug($request->name),
			'category_id' => $request->category_id,
		]);


        if($subcategory){
            return redirect(route('admin.subcategory.index'))->with('message','Sub Category added Successfully');
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
        $category = Subcategory::find($id);
        $categories = Category::all();
        return view('admin.subcategories.edit' , compact('category','categories'));

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
        $category = Subcategory::find($id);

        $category->name = $request->name;
        $category->category_id = $request->category_id;
        $category->save();

        return redirect(route('admin.subcategory.index'))->with('message' , 'Sub Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $category = Subcategory::find($id);
        
        $category->delete();
        return redirect(route('admin.subcategory.index'))->with('message' , 'Sub Category Deleted Successfully');

    }
}