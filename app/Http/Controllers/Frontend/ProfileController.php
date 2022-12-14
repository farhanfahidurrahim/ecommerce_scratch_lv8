<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\User;
use Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function setting()
    {
        return view('user.setting');
    }

    public function passwordChange(Request $request)
    {
        $request->validate([
            'old_password'=>'required',
            'password'=>'required|min:6|confirmed',
        ]);

        $current_password=Auth::user()->password; //Current Login user password get for matching

        $old_password=$request->old_password; //Old Pass 
        $new_password=$request->password; //New Pass

        if (Hash::check($old_password,$current_password)) { //check for oldpassword and current user password same or not
            $user=User::findorfail(Auth::id());
            $user->password=Hash::make($request->password);
            $user->save();
            Auth::logout();
            $notification=array('messege' => 'Password Changed Successfully!', 'alert-type' => 'success');
            return redirect()->to('/')->with($notification);
        }else{
            $notification=array('messege' => 'Old Password Not Matched!', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }

    //My Order
    public function myOrder()
    {
        $orders=DB::table('orders')->where('user_id',Auth::id())->orderBy('id','DESC')->get();
        return view('user.my_order',compact('orders'));
    }

    //Customer View Order Details
    public function viewOrder($id)
    {
        $order=DB::table('orders')->where('id',$id)->first();
        //$order=Order::findorfail($id);
        $order_details=DB::table('order_details')->where('order_id',$id)->get();

        return view('user.order_details',compact('order','order_details'));
    }
}
