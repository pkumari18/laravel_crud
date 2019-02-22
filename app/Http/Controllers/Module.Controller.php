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
       $tickets = Ticket::paginate(10);
       
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
        $tickets-> user_id= 1;
        $tickets-> issue = $request->issue;
        $tickets-> type= $request->type;
        $tickets-> priority = $request->priority;
        $tickets-> description = $request->description;
        $tickets->save();
     /*   return redirect('/helpdesk')->with('success', 'Entry Recorded successfully');*/
   }



      /*$request->validate([
       'issues'=>'required',
       'description'=>'required'
         ]);*/
    
         /* $tickets = Ticketsicket::create([
          /*'user_id'=>$request->user_id,*/
          /*'issues'=>$request->issues,
          'type'=>$request->type,
          'priority'=>$request->priority,
         'description'=>$request->description
       ]);

      echo "Successfully Added";*/
  

   /* {
        $tickets = new Ticket;
        $tickets-> user_id= $request->user_id;
        $tickets-> issues = $request->issues;
        $tickets-> type= $request->type;
        $tickets-> priority = $request->priority;
        $tickets-> description = $request->description;
        $tickets->save();
        return redirect('/helpdesk')->with('success', 'Entry Recorded successfully');

        }



*/


    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     /**/
    public function show($id)
    {
      
         $abc = Ticket::find($id);
        return view('helpdesk.show', compact('abc')); 
    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $abc = Ticket::find($id);
        return view('helpdesk.edit', compact('abc')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
      
     /* $request->validate*/

     /* $abc = Ticket::find($id);
    /*  $abc->user_id= $request->get('user_id');*/
      $abc->type = $request->get('type');
      $abc->priority = $request->get('priority');
      $abc->description = $request->get('description');
      $abc->save(); 
      return redirect('/helpdesk')->with('success', 'Tickets has been updated');
  }

       $abc = Ticket::updateOrCreate(
        ['id' => $id],
        [
          'user_id' => $request->user_id,
        ]
      );

      return $abc;
    }
  

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */

 
    public function destroy($id)
    {

      $tickets = Ticket::find($id)->delete();
      return redirect()->back()->with('success', 'deleted Successfully');
      
    }

        public function fetchSubs($type) {
        $issues = DB::table('global_tags')->where('tag', $type)->get();
        return view('helpdesk/subviews/issues', compact('issues'));
    }



  public function userTickets($id)
   {

        $tickets = Ticket::where('user_id', Auth::user()->id)->paginate(10);
        $categories = Category::all();

        return view('helpdesk.user_tickets', compact('tickets', 'categories'));

  }


}
