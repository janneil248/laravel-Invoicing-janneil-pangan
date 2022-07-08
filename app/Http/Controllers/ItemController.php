<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('item.index', [
            'items' => Item::itemxbrandxcategory()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('item.create', [
            'brands' => Brand::all(),
            'categories' => Category::all(),
        ]);
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
            'item_name' => 'required',
            'price' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required'
          
        
        ]);

        $item = new Item();
        $item->item_name = $request->item_name;
        $item->price = $request->price;
        $item->brand_id = $request->brand_id;
        $item->category_id = $request->category_id;
        $item->save();
        return redirect('items')->with('mssg','New Item Successfully Created')->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return view('item.show', [
            'item' => Item::finditemxbrandxcategory($id),
            'items' => Item::finditemxbrandxcategory($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       return view('item.edit',[
        'item' => Item::find($id),
        'brands' => Brand::all(),
        'categories' => Category::all()
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'item_name' => 'required',
            'price' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required'
          
        
        ]);

        $item = Item::find($id);
        $item->item_name = $request->item_name;
        $item->price = $request->price;
        $item->brand_id = $request->brand_id;
        $item->category_id = $request->category_id;
        $item->save();
        return redirect('items')->with('mssg','Item Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();
        return redirect('items')->with('mssg','Item Successfully Deleted');
    }
}
