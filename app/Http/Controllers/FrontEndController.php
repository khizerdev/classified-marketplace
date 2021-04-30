<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Category;
use App\Subcategory;
use App\Childcategory;
use App\Spam;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    //
    /**
     * Display the all ads.
     *
     */
    public function all()
    {
        //
        $ads = Ad::all();
        return view('all-ads',compact('ads'));
    }
    /**
     * Display the all ads based on ctageiry.
     *
     */

     public function byCategory(Request $request , $categorySlug)
     {
        $category = Category::where('slug',$categorySlug)->first();
        $catId = $category->id;

        $ads = Ad::where('status' , 'active')->where('category_id',$catId)->get();

        $categorySlug = $categorySlug;

        $filteredBySubCategory = Subcategory::where('category_id' , $catId)->get();
    
        return view('by-category',compact('categorySlug','ads','filteredBySubCategory'));
     }



    /**
     * Display the all ads based on sub ctageiry.
     *
     */
    public function bysubcategory(Request $request , $categorySlug , $subCategorySlug)
    {
        $sub = Subcategory::where('slug',$subCategorySlug)->first();
        $subId = $sub->id;
        
        // if price filter is on
        $priceFilter = Ad::where('status' , 'active')->where('subcategory_id' , $subId)->when($request->minPrice , function($query , $minPrice){
            return $query->where('price','>=',$minPrice);
        })->when($request->maxPrice , function($query , $maxPrice){
            return $query->where('price','<=',$maxPrice);
        })->get();
        
        // ads without price
        $adsWithoutPrices = Ad::where('status' , 'active')->where('subcategory_id',$subId)->get();

        $ads = ($request->minPrice || $request->maxPrice) ? $priceFilter : $adsWithoutPrices;


        $categorySlug = $categorySlug; 
        $subCategorySlug = $subCategorySlug; 

        $filteredByChildCategory = $ads->unique('childcategory_id');

        return view('by-subcategory',compact('filteredByChildCategory','categorySlug','subCategorySlug','ads'));
    }
    /**
     * Display the all ads based on sub ctageiry and child category.
     *
     */
    public function bychildcategory(Request $request , $categorySlug , $subCategorySlug , $childCategorySlug)
    {
        $sub = Subcategory::where('slug',$subCategorySlug)->first();
        $subId = $sub->id;
        $child = Childcategory::where('slug' , $childCategorySlug)->first();
        $childId = $child->id;

        // if price filter is on
        $priceFilter = Ad::where('status' , 'active')->where('childcategory_id' , $childId)->when($request->minPrice , function($query , $minPrice){
            return $query->where('price','>=',$minPrice);
        })->when($request->maxPrice , function($query , $maxPrice){
            return $query->where('price','<=',$maxPrice);
        })->get();

        $adsWithoutPrices = Ad::where('status' , 'active')->where('childcategory_id' , $childId)->get();

        $ads = ($request->minPrice || $request->maxPrice) ? $priceFilter : $adsWithoutPrices;
        
        $categorySlug = $categorySlug;   
        $subCategorySlug = $subCategorySlug; 
        $childCategorySlug = $childCategorySlug; 
        
        // $forFilterSub = Ad::where('subcategory_id',$subId)->get();
        $filteredByChildCategory = $ads->unique('childcategory_id');


        return view('by-childcategory',compact('childCategorySlug','categorySlug','subCategorySlug','ads','filteredByChildCategory'));
    }

    /**
     * Display the all ads.
     *
     */
    public function reportAd(Request $request)
    {
        //
        $request->validate([
            'reason'=> 'required',
            'email' => 'required',
            'message' => 'required',
            'ad_id' => 'required'
        ],[
            'email.required' => 'Please enter you email',
            'message.required' => 'Pleas enter comment',
        ]);

        $report = Spam::create([
            'reason' => $request->reason,
            'email' => $request->email,
            'message' => $request->message,
            'ad_id' => $request->ad_id,
        ]);

        if($report){
            return redirect()->back()->with('message',
                                    'Thank you for your feedback');
        }
    }
}
