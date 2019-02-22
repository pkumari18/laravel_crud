<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Items;
use App\Category;
use App\DB;
class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $category= Category::all();
         $items = Items::all();
      return view('item.index', compact('items','category'));
    }
   public function create()
    {
           $category= Category::all();
           $items = Items::all();
       return view('item.create', compact('items','category'));
    }
   public function store(Request $request)
    {
         /*return $request->all();*/
        /* $items = new Items;
         $items->name = $request->name;
         $items->category_id= $request->category_id;
         $items->model = $request->model;
         $items->description = $request->description;
         $items->save();
         return $items;*/
    /* }*/
/*  */
/* return $request->all();*/
   
         $items = new Items([
        'name' => $request->get('name'),
        'model'=> $request->get('model'),
        'category_id'=>$request->get('id'),
        'description'=> $request->get('description')
      ]);
      $items->save();
      return redirect('/item')->with('success', 'item has been added');
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
       $item->category_id= $request->category_id;
       $item->model = $request->get('model');
      
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
       return redirect('/item')->with('success', 'item has been deleted Successfully');
     }
    
       public function deleteMultiple(Request $request){

        $ids = $request->ids;

       Items::whereIn('id',explode(",",$ids))->delete();

        return response()->json(['status'=>true,'message'=>"Category deleted successfully."]);   

    }
    }




