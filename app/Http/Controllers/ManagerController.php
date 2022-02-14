<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use App\Vehicle;
use App\Task; 
use App\Bill;

  
class ManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:manager');
    }

     public function requested_vehicles()
    {  
        $vehicles = Vehicle::where('status', "Request")->get(); 
        return view("manager.vehicle.allvehicle",compact("vehicles",$vehicles));
    }

     public function accepted_vehicles()
    {  
        $vehicles = Vehicle::where('status', "Progress")->get(); 
        return view("manager.vehicle.acceptedvehicle",compact("vehicles",$vehicles));
    }

     public function rejected_vehicles()
    {  
        $vehicles = Vehicle::where('status', "Rejected")->get(); 
        return view("manager.vehicle.rejectedvehicle",compact("vehicles",$vehicles));
    }


    public function accept_request(Request $request, $id)
    { 
        $vehicle = Vehicle::find($id); 
        $vehicle->status = "Progress";
        $vehicle->task_status = "Waiting";   
        $vehicle->update();
        return redirect()->back();
    }

    public function reject_request(Request $request, $id)
    { 
        $vehicle = Vehicle::find($id); 
        $vehicle->status = "Rejected";  
        $vehicle->update();
        return redirect()->back();
    }

     public function destroy($id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->delete();
        return redirect()->back();
    }

      public function allvehilce_bills()
    {  
        $vehicles = Vehicle::where('task_status', "Assigned")->where('worker_status',"Working")->get(); 
        return view("manager.bill.billvehicle",compact("vehicles",$vehicles));
    }

     public function view_bill($id)
    {  
        $bills= Bill::where('vehicle_id',$id)->get()->sortBy('sequence');
        return view("manager.bill.bills",compact("bills","id"));
    }
    

    //For Task assign

     public function requested_tasks()
    {  
        $vehicles = Vehicle::where('status', "Progress")->where('task_status',"Waiting")->get(); 
        return view("manager.task.alltask",compact("vehicles",$vehicles));
    }

     public function assigned_tasks()
    {  
        $vehicles = Vehicle::where('status', "Progress")->where('task_status',"Assigned")->get(); 
        return view("manager.task.allassigntask",compact("vehicles",$vehicles));
    }

      public function accepted_tasks()
    {  
        $vehicles = Vehicle::where('status', "Progress")->where('task_status',"Accepted")->get(); 
        return view("manager.task.allassigntask",compact("vehicles",$vehicles));
    }

     public function rejected_tasks()
    {  
        $vehicles = Vehicle::where('status', "Progress")->where('task_status',"Rejected")->get(); 
        return view("manager.task.rejectedtask",compact("vehicles",$vehicles));
    }

  
      public function assign_tasks($id)
    {  
        $vehicles = Vehicle::where('id',$id)->first();  
        return view("manager.task.newassign",compact("vehicles",$vehicles));
    }

      public function editassign_tasks($id)
    {  
        $vehicles = Vehicle::where('id',$id)->first();  
        return view("manager.task.edit",compact("vehicles",$vehicles));
    }

    public function task_save(Request $request, $id)
    { 
        $manager_id = auth::user()->id;
        // dd($request->worker_id);die();


        $vehicle = Vehicle::find($id);  

        $vehicle->manager_id = $manager_id;
        $vehicle->worker_id = $request->worker_id;
        $vehicle->manager_message = $request->manager_message;
        $vehicle->ending_date = $request->ending_date; 
        $vehicle->task_status = "Assigned";
        $vehicle->worker_status = "Waiting"; 
        $vehicle->save();

        return redirect('assigned_task'); 
    }

      public function task_update(Request $request, $id)
    { 
        $manager_id = auth::user()->id;
        // dd($request->worker_id);die();


        $vehicle = Vehicle::find($id);  

        $vehicle->manager_id = $manager_id;
        $vehicle->worker_id = $request->worker_id;
        $vehicle->manager_message = $request->manager_message;
        $vehicle->ending_date = $request->ending_date; 
        $vehicle->task_status = "Assigned";
        $vehicle->worker_status = "Waiting"; 
        $vehicle->update();

        return redirect('assigned_task'); 
    }

    public function reject_tasks(Request $request, $id)
    { 
        $vehicle = Vehicle::find($id); 
        $vehicle->task_status = "Rejected";    
        $vehicle->update();
        return redirect('rejected_task');
    }
 
    public function del_task($id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->delete();
        return redirect()->back();
    }
    


 }
