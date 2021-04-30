<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Category;
use App\Childcategory;
use App\City;
use App\Country;
use App\SaveAd;
use App\State;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        if($user->admin){
            $ads = Ad::orderBy('created_at','desc')->paginate(10);
           
        } else {
            $ads = Ad::where("user_id", "=", $user->id)->orderBy('created_at','desc')->paginate(10);
        }
        return view('admin.ads.index' , compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $childcategories = Childcategory::all();
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        return view('admin.ads.create', compact('categories','subcategories','childcategories','countries','states','cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
     
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'childcategory_id' => 'required',
            'condition' => 'required',
            'featured'=>'required',
            'desc'=>'required',
            'price'=>'required',
            'price_status'=>'required',
            'location'=>'required',
            'country_id'=>'required',
            'state_id'=>'required',
            'city_id'=>'required',
            'phone'=>'required',
        ],[
            'desc.required'=> 'Ad description is required',
            'price.required'=>'Enter the price'
        ]);

        $featured_gallery = [];
        if($request->hasFile('featured')){ 
           foreach ($request->featured as $key => $value) {

               $featured = $request->file('featured')[$key];

               $names = rand() . '.' . $featured->getClientOriginalExtension();

               $featured->move(public_path('admin/upload/'), $names);

               $gallery = 'admin/upload/'.$names;

               array_push($featured_gallery,$gallery);
           }
      }

      $ad = Ad::create([
        'user_id' => Auth::id(),
        'name' => $request->name,
        'slug' => Str::slug($request->name),
        'desc'=>$request->desc,
        'category_id' => $request->category_id,
        'subcategory_id' => $request->subcategory_id,
        'childcategory_id' => $request->childcategory_id,
        'condition' => $request->condition,
        'featured' => implode(",",$featured_gallery),
        'price' => $request->price,
        'price_status' => $request->price_status,
        'phone' => $request->phone,
        'location' => $request->location,
        'country_id' => $request->country_id,
        'state_id' => $request->state_id,
        'city_id' => $request->city_id,
    ]);

    return redirect(route('admin.ads.index'))->with('message' , 'Ad Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $ad = Ad::where('slug',$slug)->get()->first();
        $category_id = $ad->category_id;
        $relatedAds = Ad::where('category_id' ,'=', $category_id)->where('id','!=',$ad->id)->get();
    

        return view('single-ad',compact('ad','relatedAds'));
    }
    /**
     * save the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function saveAd(Request $request)
    {
        if(!Auth::check())
        {
            return redirect()->back()->with('error','Please login to save this ad');
        } else 
        {
            $this->validate($request, array(
                'user_id'=>'required',
                'ad_id' =>'required',
            ));
            
            $status=SaveAd::where('user_id',Auth::user()->id)
            ->where('ad_id',$request->ad_id)
            ->first();
            
            if(isset($status->user_id) and isset($request->ad_id))
                {
                    return redirect()->back()->with('message', 'This ad is already in your save item list!');
                }
                else
                {
                    $saveAd = new SaveAd;
            
                    $saveAd->user_id = $request->user_id;
                    $saveAd->ad_id = $request->ad_id;
                    $saveAd->save();
            
                    return redirect()->back()->with('message',
                                    'Item, '. Str::words($saveAd->ad->name ,2).' Added to your Saved List.');
                }
        }
        
    }

    public function removeSaveAd(Request $request)
    {
        $ad = SaveAd::where('user_id' , auth()->user()->id)->where('ad_id' , $request->ad_id)->first();
        $ad->delete();

        return redirect()->back()->with('message',
                                    'Ad removed from your Saved List.');
    }

    public function savedAds(){

        $ads = SaveAd::where('user_id' , auth()->user()->id)->orderBy('created_at' , 'desc')->get();
        return view('admin.saved.index' , compact('ads'));
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
        $ad = Ad::find($id);

        $this->authorize('edit-ad' , $ad);

        return view('admin.ads.edit' , compact('ad'));
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
        //
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'childcategory_id' => 'required',
            'condition' => 'required',
            'desc'=>'required',
            'price'=>'required',
            'price_status'=>'required',
            'location'=>'required',
            'country_id'=>'required',
            'state_id'=>'required',
            'city_id'=>'required',
            'phone'=>'required',
        ],[
            'desc.required'=> 'Ad description is required',
            'price.required'=>'Enter the price'
        ]);


       $ad = Ad::find($id);

       $data = $request->all();

       $featured_gallery = [];
       if($request->hasFile('featured')){ 
          foreach ($request->featured as $key => $value) {

              $featured = $request->file('featured')[$key];

              $names = rand() . '.' . $featured->getClientOriginalExtension();

              $featured->move(public_path('admin/upload/'), $names);

              $gallery = 'admin/upload/'.$names;

              array_push($featured_gallery,$gallery);

              $ad->featured = implode(",",$featured_gallery);
          }
     }

     $ad->update($data);

     return redirect(route('admin.ads.index'))->with('message' , 'Ad Updated Successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $ad = Ad::find($id);

        $ad->delete();

        return redirect(route('admin.ads.index'))->with('message' , 'Ad Deleted Successfully');
    }
    /**
     * Add the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function saved()
    {
        return view('admin.saved.index');
    }


    /**
     * Dsiable the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function disable(Request $request, $id)
    {
       $ad = Ad::find($id);

       $ad->status = 'disabled';

       $ad->save();

       return redirect(route('admin.ads.index'))->with('message' , 'Ad Disabled Successfully');
    }
   /**
    * Approve the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function active(Request $request, $id)
    {
       $ad = Ad::find($id);

       $ad->status = 'active';

       $ad->save();

       return redirect(route('admin.ads.index'))->with('message' , 'Ad Approved Successfully');
    }
}
