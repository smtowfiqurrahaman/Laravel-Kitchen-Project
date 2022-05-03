<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Item;
use App\Models\Category;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('admin.item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::all();
        $categories = Category::all();
        return view('admin.item.create', compact('items','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'category' => 'required',
            'name' => 'required' ,
            'description' => 'required' ,
            'price' => 'required' ,
            'image' => 'required'
        ]);

        // $item = new Item();
        $image = $request->file('image');
        $slug = str_slug($request->name);

        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.'.'.$image->getClientOriginalExtension();
            if (!file_exists('uploads/item')) {
                mkdir('uploads/item', 077, true);
           }
           $image->move('uploads/item', $imagename);
        }else{
            $imagename  = 'default.png';
        }

        $item = new Item();
        $item->category_id = $request->category;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->image = $imagename;

        $item->save();
        return redirect()->route('item.index');

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
          $item = Item::find($id);
          $categories = Category::all();
          return view('admin.item.edit', compact('item', 'categories'));
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
        $this->validate($request ,[
            'category' => 'required',
            'name' => 'required' ,
            'description' => 'required' ,
            'price' => 'required' 
            // 'image' => 'required'
        ]);

        $item = Item::find($id);
        $image = $request->file('image');
        $slug = str_slug($request->name);

        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.'.'.$image->getClientOriginalExtension();
            if (!file_exists('uploads/item')) {
                mkdir('uploads/item', 077, true);
           }
           $image->move('uploads/item', $imagename);
        }else{
            $imagename  = 'default.png';
        }

        // $item = new Item();
        $item->category_id = $request->category;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->image = $imagename;

        $item->save();
        return redirect()->route('item.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        if (file_exists('uploads/item/'.$item->image)) {
            unlink('uploads/item/'.$item->image);  
        }
        $item->delete();
        return redirect()->route('item.index');
    }
}
