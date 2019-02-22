<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use DB;
class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $tickets = Ticket::all();
       return view('helpdesk.index', compact('tickets'));
   }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
     $tickets = Ticket::all();
     return view('helpdesk.create', ['tickets' => $tickets]);   
 }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tickets = new Ticket;
        $tickets-> user_id= $request->user_id;
        $tickets-> issues = $request->issues;
        $tickets-> type= $request->type;
        $tickets-> priority = $request->priority;
        $tickets-> description = $request->description;
        $tickets->save();
        return redirect('/tickets')->with('success', 'Entry Recorded successfully');

        }






    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        /*$tickets = Ticket::find($id);
        return view('tickets.edit', compact('tickets')); */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
     /*
      $tickets = Ticket::find($id);
      $tickets->user_id= $request->get('user_id');
      $tickets->type = $request->get('type');
      $tickets->priority = $request->get('priority');

      $tickets->description = $request->get('description');
      $tickets->save(); 
      return redirect('/tickets')->with('success', 'Tickets has been updated');*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {

      $tickets = Ticket::find($id)->delete();
      return redirect()->back()->with('success', 'deleted Successfully');
      
    }
    /*public function myform()
    {
        $tickets = DB::table('tickets')->pluck("name","id")->all();
        return view('tickets',compact('tickets'));
    }
*/

    /**
     * Show the application selectAjax.
     *
     * @return \Illuminate\Http\Response
     
   /* public function selectAjax(Request $request)
    {
        if($request->ajax()){
            $states = DB::table('states')->where('id_country',$request->id_country)->pluck("name","id")->all();
            $data = view('ajax-select',compact('states'))->render();
            return response()->json(['options'=>$data]);
        }
    }
  */
 public function dashboardCreate()
    {   
     $tickets = Ticket::all();
     return view('helpdesk.dashboardCreate', ['tickets' => $tickets]);   
 }

}
