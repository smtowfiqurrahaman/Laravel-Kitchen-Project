<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Carbon\Carbon;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders  = Slider::all();
       return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
        'title' => 'required',
        'sub_title' => 'required',
        'image' => 'required'
       ]);

       $image = $request->file('image');
       $slug = str_slug($request->title);

       $slider = new Slider();
       $slider->title = $request->title;

       if (isset($image)) {
           $currentDate = Carbon::Now()->toDateString();
           $imagename = $slug.'-'.$currentDate.'-'.'.'.$image->getClientOriginalExtension();

           if (!file_exists('uploads/slider')) {
               mkdir('uploads/slider', 077, true);
           }
         $image->move('uploads/slider', $imagename);
       }else{
        $imagename = 'default.png';
       }

       $slider = new Slider();
       $slider->title = $request->title;
       $slider->sub_title = $request->sub_title;
       $slider->image = $imagename;
       
       $slider->save();
       return redirect()->route('slider.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $slider = Slider::find($id);
        // return view('welcome', compact('silder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit',compact('slider'));
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
        $this->validate($request, [
        'title' => 'required',
        'sub_title' => 'required'
        
       ]);

       $slider = Slider::find($id);
       $image = $request->file('image');
       $slug = str_slug($request->title);

       
       $slider->title = $request->title;
       
       if (isset($image)) {
           $currentDate = Carbon::Now()->toDateString();
           $imagename = $slug.'-'.$currentDate.'-'.'.'.$image->getClientOriginalExtension();

           if (!file_exists('uploads/slider')) {
               mkdir('uploads/slider', 077, true);
           }
           $image->move('uploads/slider', $imagename);
       }else{
        $imagename = $slider->image;
       }

       $slider->title = $request->title;
       $slider->sub_title = $request->sub_title;
       $slider->image = $imagename;
       
       $slider->save();
       return redirect()->route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $slider = Slider::find($id);
       if (file_exists('uploads/slider/'.$slider->image)) {
           unlink('uploads/slider/'.$slider->image);
       }

       $slider->delete();
       return redirect()->route('slider.index');
    }
}
