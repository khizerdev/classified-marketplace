<?php

namespace App\Http\Controllers;

use App\Category;
use App\Childcategory;
use App\Subcategory;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function getCategory()
    {

        $category = Category::all();
        return response()->json($category);
        
    }
    public function getSubCategory(Request $request)
    {

        $subcategory = Subcategory::where('category_id',$request->category_id)->get();
        return response()->json($subcategory);
        
    }
    public function getChildCategory(Request $request)
    {

        $childcategory = Childcategory::where('subcategory_id',$request->subcategory_id)->get();
        return response()->json($childcategory);
        
    }
}
