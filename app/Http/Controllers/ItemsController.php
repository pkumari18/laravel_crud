<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Items;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
      $items = Items::all();
      return view('item.index', compact('items'));
    }

    public function store(Request $request)
    {
        // return $request->all();
         $item = new Items;
         $item->name = $request->name;
         $item->category_id = 1;
         $item->model = $request->model;
         $item->description = $request->description;
         $item->save();

         return $item;
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
      $item = Items::find($id);

      return view('item.edit', compact('item'));
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
        $request->validate([
        'name'=>'required',

      ]);
       $item = Items::find($id);
       $item->name = $request->get('name');
       $item->category = $request->get('category');
       $item->model = $request->get('model');
       $item->barcode = $request->get('barcode');
       $item->description = $request->get('description');
       $item->save();

      return redirect('/item')->with('success', 'item has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $item = Items::find($id);
     $item->delete();

     return redirect('/item')->with('success', 'Stock has been deleted Successfully');
     }
       public function fetch($name) {
        $category = DB::table('category')->where('id', $name)->get();
        return view('dashboard/categorydrop', compact('category'));
     }
   }
