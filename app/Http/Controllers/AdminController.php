<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin_login');
    }

    public function dashbaord()
    {
        return view('admin.index');
    }

    public function login(Request $requset)
    {
        //  dd($requset->all());   

        $check = $requset->all();
        if(Auth::guard('admin')->attempt(['email' => $check['email'], 'password' =>$check['password'] ]))
        {
            return redirect()->route('admin.dashboard')->with('error','Successfully Logged in');

        }
        else 
        {
            return redirect()->back()->with('error','Invalid Admin Credentials');
        }
    }

    public function AdminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login_form')->with('error','Admin Logged Out Successfully');

    }

    public function register (){
        return view('admin.admin_register');
    }

    public function register_store(Request $request)
    {
        // dd($requset->all());
        Admin::insert([
            'uname' => $request->uname,
            'dept_name' => $request->dept_name,
            'dept_address' => $request->dept_address,
            'st_address' => $request->st_address,
            'p_code' => $request->p_code,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'lts_code' => $request->countryCode . ' ' . $request->lts_code,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('login_form')->with('error','Vendor Created Successfully');
    }
    
}
