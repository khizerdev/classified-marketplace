<?php

namespace App\Http\Controllers;

use App\Childcategory;
use App\Subcategory;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;

class ChildcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Childcategory::all();
        return view('admin.childcategories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Subcategory::all();
        return view('admin.childcategories.create',compact('categories'));
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
            'name' => 'required|unique:childcategories',
            'subcategory_id' => 'required'
        ], [
            'name.unique' => 'This child is already been created',
            'name.required' => 'Child category name is required',
        ]);
    
        $childcategory = Childcategory::create([
			'name' => $request->name,
            'slug' => Str::slug($request->name),
			'subcategory_id' => $request->subcategory_id,
		]);


        if($childcategory){
            return redirect(route('admin.childcategory.index'))->with('message','Sub Category added Successfully');
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
        $category = Childcategory::find($id);
        $categories = Subcategory::all();
        return view('admin.childcategories.edit' , compact('category','categories'));

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
        $category = Childcategory::find($id);

        $category->name = $request->name;
        $category->subcategory_id = $request->subcategory_id;
        $category->save();

        return redirect(route('admin.childcategory.index'))->with('message' , 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $category = Childcategory::find($id);
        
        $category->delete();
        return redirect(route('admin.childcategory.index'))->with('message' , 'Category Deleted Successfully');

    }
}