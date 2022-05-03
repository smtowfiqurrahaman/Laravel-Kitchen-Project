<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class ResrvationController extends Controller
{
    public function reserve(Request $request)
    {
    	$this->validate($request,[
    		'name' => 'required',
    		'phone' => 'required',
    		'email' => 'required',
    		'dateandtime' => 'required'
    	]);

    	$reservation = new Reservation();

    	$reservation->name = $request->name;
    	$reservation->phone = $request->phone;
    	$reservation->email = $request->email;
    	$reservation->date_and_time = $request->dateandtime;
    	$reservation->message = $request->message;
    	$reservation->status = false;

    	$reservation->save();
    	 Toastr::success('Your Request sent Successfully. We will confirm you soon.', 'Success', ["positionClass" => "toast-top-right"]);
         
    	 // Toastr::error('Please Fill All Data', 'Error', ["positionClass" => "toast-top-right"]);

    	return redirect()->back();
    	
    }
}
