<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;

class ResrvationController extends Controller
{
    public function index(){
    	$reservations = Reservation::all();
    	return view('admin.reservation.index', compact('reservations'));
    }

    public function status($id)
    {
    	$reservation = Reservation::find($id);
    	$reservation->status = true;
    	$reservation->save();
    	return redirect()->back();
    }
    
    public function destroy($id)
    {
    	Reservation::find($id)->delete();
    	return redirect()->route('reservation.index');
    }
}
