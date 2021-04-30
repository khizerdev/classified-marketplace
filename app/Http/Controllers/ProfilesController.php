<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //\
        $user = Auth::user();
        return view('admin.profile.index' , compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'email' => 'required|email',
            'phone' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required'
        ],[
            'country_id.required' => 'Please select Country',
            'state_id.required' => 'Please select State',
            'city_id.required' => 'Please select City'
        ]
    );

        $user = Auth::user();

        if($request->has('avatar')){
            $avatar = $request->avatar;
            $name = time().$avatar->getClientOriginalName();
            $avatar->move('images' , $name);
            $user->profile->avatar = 'images/' . $name;
            $user->profile->save();
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile->country_id = $request->country_id;
        $user->profile->state_id = $request->state_id;
        $user->profile->city_id = $request->city_id;
        $user->profile->facebook_id = $request->facebook_id;
        $user->profile->phone = $request->phone;
        $user->profile->about = $request->about;
       

        if($request->password != ''){
            $user->password = bcrypt($request->password);
        }

        $user->save();
        $user->profile->save();

        return redirect()->back()->with('message', 'Profile Updated Successfully');
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
    }
}
