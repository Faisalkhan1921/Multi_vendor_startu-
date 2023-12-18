<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.customer_login');
    }

    public function dashbaord()
    {
        return view('customer.index');
    }

    public function login(Request $requset)
    {
        //  dd($requset->all());   

        $check = $requset->all();
        if(Auth::guard('customer')->attempt(['email' => $check['email'], 'password' =>$check['password'] ]))
        {
            return redirect()->route('customer.dashboard')->with('error','Successfully Logged in');

        }
        else 
        {
            return redirect()->back()->with('error','Invalid Admin Credentials');
        }
    }

    public function AdminLogout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('customer_login_form')->with('error','Customer Logged Out Successfully');

    }

    public function register (){
        return view('customer.customer_register');
    }

    public function register_store(Request $request)
    {
        // dd($requset->all());
        Customer::insert([
            'ref_num' => 'ref' . $request->phone . date('Ymd') . '-' . mt_rand(1000, 9999),
            'name' => $request->name,
            'email' => $request->email,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'phone' => $request->countryCode . ' ' .$request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('customer_login_form')->with('error','Customer Created Successfully');
    }

}
