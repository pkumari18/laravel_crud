<?php
namespace App\Http\Controllers;
use App\Courier;
use App\User;
use App\DB;
use App\CourierHandler;
use App\Description;
use Illuminate\Http\Request;
class CourierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      return view('couriers.index');
    }
    public function listCouriers($type)
    {
      $couriers = Courier::where('type', $type)->get();
      if($type == 'inward')
      {

        return view('couriers.list-inward', compact('couriers'));
      }
      else if($type == 'outward')
      {
        return view('couriers.list-outward', compact('couriers'));
      }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
      $request->validate([
       'from'=>'required',
       'to'=>'required'
     ]);
      if ($request->type=='inward')
      {
        $couriers = Courier::create([
         'from'=>$request->from,
         'to'=>$request->to,
         'received_by'=>$request->received_by,
         'description'=>$request->description,
         'type'=>'inward'
       ]);
      }
      else if($request->type=='outward')
      {
       $couriers = Courier::create([
         'to'=>$request->to,
         'from'=>$request->from,
         'posted_by'=>$request->posted_by,
         'description'=>$request->description,
         'type'=>'outward'
       ]);
     }
     echo "Successfully Added";
   }
    /**
     * Display the specified resource.
     *
     * @param  \App\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,  $id)
    {
      $courier = Courier::find($id); //for courier detail

      $users = User::all(); //for dropdown
       $handovers = CourierHandler::where('courier_id',$courier->id)->get();//for handover 
       /*  $couriers  = Courier::all();*/
       return view('couriers.show', compact('courier','users', 'handovers','couriers'));
     }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,  $id)
    {
     $couriers = Courier::find($id);

     return view('couriers.edit', compact('couriers'));
   }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
     // $couriers= Courier::find($id);
     // $couriers->from = $request->from;
     // $couriers->to = $request->to;
     // $couriers->received_by = $request->received_by;
     // $couriers->posted_by = $request->posted_by;
     // $couriers->description = $request->description;
     // $couriers->save();
      
     // return redirect('/couriers')->with('status', 'updated Sucessfully');

      $courier = Courier::updateOrCreate(
        ['id' => $id],
        [
          'description' => $request->description
        ]
      );

      return $courier;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $couriers = Courier::find($id)->delete();
      return redirect()->back()->with('success', 'deleted Successfully');
    }

    public function forwardCouriers(Request $request,  $id)
    {
     $couriers = CourierHandler::create([
      'user_id' => $request->user_id,//for forward handover couriers
      'courier_id'=> $id,
    ]);

     echo "success";
   }

  /* public function descriptionsCouriers(Request $request){
   
      $description  = Description::create([
      'courier_id'=>$request->courier_id,//for descriptions both inward and outward couriers
      'body'=>$request->body
    ]);
    return $description ;*/
/*  }
*/}
