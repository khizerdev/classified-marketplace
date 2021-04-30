<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Category;
use App\Contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ads = Ad::all();
        $latestAds = Ad::where('status' , 'active')->orderBy('created_at' , 'desc')->take(3)->get();
        $categories = Category::all();
        return view('home',compact('ads','categories','latestAds'));
    }
    /**
     * contac us form
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact()
    {
        return view('contact');
    }
    /**
     * contac us form store
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contactSubmit(Request $request)
    {
       $request->validate([
           'name'=>'required',
           'email'=>'required',
           'subject'=>'required',
           'message'=>'required',
       ],[
            'name.required' => 'Please enter your name',
            'email.required' => 'Please enter your email',
            'subject.required' => 'Please enter subject',
            'message.required' => 'Please enter your Message',
       ]);

       $contact  = Contact::create([
           'name' => $request->name,
           'email' => $request->email,
           'subject' => $request->subject,
           'message' => $request->message,
       ]);

       if($contact){
        return redirect(route('contact'))->with('message','Message sent Successfully');
    }

       
    }
    /**
     * fetch all categories
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
  
}
