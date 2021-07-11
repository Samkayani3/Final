<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AccountController;
use App\Account;
use App\User;
use Auth;

class AccountController extends Controller
{
    public function myProfile(){
        $userId = Auth::user()->id;
        $account = User::find($userId);
        return view('frontend.myProfile')->with(compact('account'));
    }

    public function updateProfile(Request $request,$id){
        User::where(['id'=>$id])->update([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'role'=>$request['role'],
            'phone_no'=>$request['phone_no'],
            'address1'=>$request['address1'],
            'address2'=>$request['address2'],
        ]);

   
        return redirect()->back()->with('msg','Account updated Successfully');
    }

    public function vendorProfile(){
        $userId =Auth::user()->id;
        $account = User::find($userId);
        return view('vendor.myProfile')->with(compact('account'));
    }

    public function updateVendorProfile(Request $request,$id){
        User::where(['id'=>$id])->update([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'role'=>$request['role'],
            'phone_no'=>$request['phone_no'],
            'address1'=>$request['address1'],
            'address2'=>$request['address2'],
        ]);

   
        return redirect()->back()->with('msg','Account updated Successfully');
    }

    
}
