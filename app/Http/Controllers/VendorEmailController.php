<?php

namespace App\Http\Controllers;

use Image;
use Carbon\Carbon;
use App\Models\AccessList;
use App\Models\EmailReceive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorEmailController extends Controller
{
    //

    public function index()
    {
        $id = Auth::guard('admin')->user()->id;
        // dd($id);
        $user = AccessList::where('user_id',$id)->first();
        return view('admin.email.index',compact('user'));
    }

    public function store(Request $request)
    {
        $user = Auth::guard('admin')->user()->id;
        AccessList::insert([
            'email' => $request->email,
            'user_id' => $user,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('error','Seller Email Added Successfully');
    }

    public function update(Request $request,$id)
    {
        $user = Auth::guard('admin')->user()->id;
        
        AccessList::find($id)->update([
            'email' => $request->email,
            'user_id' => $user,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('error','Seller Email Updated Successfully');
    }

    public function sendview()
    {
        $id = Auth::guard('admin')->user()->id;
        // dd($id);
        $user = AccessList::where('user_id',$id)->first();

        return view('admin.email.sendview',compact('user'));
    }

    public function sendemail(Request $request)
    {
        $id = Auth::guard('admin')->user()->id;
        // dd($id);
        $user = AccessList::where('user_id',$id)->first();


        if($user->email  == $request->sender_email)
        {
            $image = $request->file('receipt');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
    
            Image::make($image)->resize(300,300)->save('upload/receipt/'.$name_gen);
            $save_url = 'upload/receipt/'.$name_gen;
    
            EmailReceive::insert([
                'sender_email' => $request->sender_email,
                'recipent_email' => $request->recipent_email,
                'receipt' => $save_url,
                'created_at' => Carbon::now(),
            ]);
          
        return redirect()->back()->with('error','Email Sent Successfully');
    
        }
        else 
        {
            return redirect()->back()->with('error','Email Doesnt Exist in AccessList');
        }
      
    }
}
