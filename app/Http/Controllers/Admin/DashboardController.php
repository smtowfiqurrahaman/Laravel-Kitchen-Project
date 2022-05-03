<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index()
   {
   	return view('admin.dashboard');
   }
   public function loginToDashboard(){
   	 $this->validate($request,[
   	  	'name' => 'required|min:3|max:20', //name= Frrm name
   	  	'Discription' => 'required'
   	  ]);

   	  $todo = new Todo();

   	  $todo->Name = $request->name;
   	  $todo->Discription = $request->Discription;
   	  $todo->completed = false;

   	  $todo->save();
   	  return redirect('/todoapp');
   }
}
