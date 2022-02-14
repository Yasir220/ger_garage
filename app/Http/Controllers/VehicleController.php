<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Vehicle;

class VehicleController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth:user');
    }
    public function index()
    {
        $user_id=auth::user()->id;
        $vehicles = Vehicle::where('user_id', $user_id)->get(); 
        return view("user.vehicle.allvehicle",compact("vehicles",$vehicles));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('user.vehicle.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $vehicle = new Vehicle;

        $vehicle->name = $request->name;
        $vehicle->phone = $request->phone;
        $vehicle->vehicle_type = $request->vehicle_type;
        $vehicle->vehicle_name = $request->vehicle_name;
        $vehicle->vehicle_engine = $request->vehicle_engine;
        $vehicle->vehicle_made = $request->vehicle_made;
        $vehicle->vehicle_licence = $request->vehicle_licence;
        $vehicle->vehicle_service_category = $request->vehicle_service_category;
        $vehicle->booking_date = $request->booking_date;
        $vehicle->vehicle_issue = $request->vehicle_issue;
        $vehicle->status = $request->status;
        $vehicle->user_id = auth::user()->id;     
        
        $max_order = Vehicle::max('sequence'); 
        if($max_order){$vehicle->sequence = ++$max_order;}
        else{ $vehicle->sequence = 01;}  
        
        $vehicle->save();
        return redirect()->route('vehicless'); 
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
        $vehicles = Vehicle::where('id', $id)->first();
        return view('user.vehicle.edit', compact("vehicles",$vehicles));
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
         

        $vehicle = Vehicle::find($id);

        $vehicle->name = $request->name;
        $vehicle->phone = $request->phone;
        $vehicle->vehicle_type = $request->vehicle_type;
        $vehicle->vehicle_name = $request->vehicle_name;
        $vehicle->vehicle_engine = $request->vehicle_engine;
        $vehicle->vehicle_made = $request->vehicle_made;
        $vehicle->vehicle_licence = $request->vehicle_licence;
        $vehicle->vehicle_service_category = $request->vehicle_service_category;
        $vehicle->booking_date = $request->booking_date;
        $vehicle->vehicle_issue = $request->vehicle_issue;
        $vehicle->status = $request->status;   
        $vehicle->user_id = auth::user()->id;  
        
        $max_order = Vehicle::max('sequence'); 
        if($max_order){$vehicle->sequence = ++$max_order;}
        else{ $vehicle->sequence = 01;} 

        $vehicle->update();
        return redirect()->route('vehicless');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->delete();
        return redirect()->route('vehicless');
    }
    public function sort_event(Request $request){
        // return $request;
        $events = $request->data;
        $i = 0;
        foreach ($events as  $id) {
            $event = Vehicle::find($id);
            $event->sequence  = $i;
            $event->update();
            $i++;
        }
    }
}
