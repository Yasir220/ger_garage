<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\subcategory; 
use App\Product;
use App\Vehicle;
use App\Bill;

class WorkerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:worker');
    }

    public function dashboard(){
    	 $category = Category::all();
        return view('worker.dashboard',compact('category',$category));
    }
   
     public function all_repairs(){ 
        $vehicles = Vehicle::where('task_status', "Assigned")->where('worker_status',"Waiting")->get(); 
        return view("worker.vehicle.allvehicle",compact("vehicles",$vehicles));
    }

     public function accepted_repairs()
    {  
        $vehicles = Vehicle::where('task_status', "Assigned")->where('worker_status',"Working")->get(); 
        return view("worker.vehicle.acceptedvehicle",compact("vehicles",$vehicles));
    }

     public function rejected_repairs()
    {  
        $vehicles = Vehicle::where('task_status', "Assigned")->where('worker_status',"Rejected")->get(); 
        return view("worker.vehicle.rejectedvehicle",compact("vehicles",$vehicles));
    }

     public function holded_repairs()
    {  
        $vehicles = Vehicle::where('task_status', "Assigned")->where('worker_status',"Hold")->get(); 
        return view("worker.vehicle.holdvehicle",compact("vehicles",$vehicles));
    }



      public function accept_repair(Request $request, $id)
    { 
        $vehicle = Vehicle::find($id);     
        $vehicle->worker_status = "Working";   
        $vehicle->update();
        return redirect()->back();
    }

    public function reject_repair(Request $request, $id)
    { 
        $vehicle = Vehicle::find($id); 
        $vehicle->worker_status = "Rejected";  
        $vehicle->update();
        return redirect()->back();
    }
     public function hold_repairs(Request $request, $id)
    { 
        $vehicle = Vehicle::find($id); 
        $vehicle->worker_status = "Hold";  
        $vehicle->update();
        return redirect()->back();
    }

     public function destroy(Request $request, $id)
    { 
        $vehicle = Vehicle::find($id); 
        $vehicle->task_status = "Delete";  
        $vehicle->update();
        return redirect()->back();
    }



     public function allvehilce_accepteds()
    {  
        $vehicles = Vehicle::where('task_status', "Assigned")->where('worker_status',"Working")->get(); 
        return view("worker.part.acceptedvehicle",compact("vehicles",$vehicles));
    }

     public function allvehilce_bills()
    {  
        $vehicles = Vehicle::where('task_status', "Assigned")->where('worker_status',"Working")->get(); 
        return view("worker.bill.billvehicle",compact("vehicles",$vehicles));
    }

     public function view_bill($id)
    {  
        $bills= Bill::where('vehicle_id',$id)->get()->sortBy('sequence');
        return view("worker.bill.bills",compact("bills","id"));
    }

    public function addvehicle_parts($id)
    {  
        $vehicles = Bill::where('vehicle_id',$id)->get()->sortBy('sequence');
        return view("worker.part.subparts",compact("vehicles","id"));
    }

    

    public function sub_product($id)
    {  
     // dd($id);die(); 
        $data2 = Product::where('category_id',$id)->get()->sortBy('sequence');
        return $data2;
    }
 

     public function new_subparts($id)
    {  
        $vehicles = Vehicle::where('task_status', "Assigned")->where('worker_status',"Working")->get(); 
        return view("worker.part.new_subpart",compact("vehicles","id"));
    }

     public function edit_subparts($id)
    {  
        $bill = Bill::where('id', $id)->first();
        return view("worker.part.edit_subpart",compact("bill","id"));
    }

      public function store_parts(Request $request)
    {   
        $id = $request->product;
         $Product = Product::find($id);   
        // dd($id);die();
         $bill = new Bill;
         $bill->name = $Product->name;
         $bill->category_id = $Product->category_id;
         $bill->Subcategory_id = $Product->sub_category_id;
         $bill->product_id = $id;
         $bill->price = $Product->sale_price;
         $bill->quantity = $request->qnty;
         $bill->description = $Product->description;
         $bill->image = $Product->image;
         $bill->worker_message = $request->message; 
         $bill->worker_status = "Working"; 
         $bill->bill_status = $Product->name;
         $bill->vehicle_id = $request->vehicle;


         $bill->save();
        return redirect()->back();
    }

     public function update_parts(Request $request,$id)
    {   
        $id = $request->product;
         $Product = Product::find($id);   
        // dd($id);die();
         $bill = Bill::find($id);
         $bill->name = $Product->name;
         $bill->category_id = $Product->category_id;
         $bill->Subcategory_id = $Product->sub_category_id;
         $bill->product_id = $id;
         $bill->price = $Product->sale_price;
         $bill->quantity = $request->qnty;
         $bill->description = $Product->description;
         $bill->image = $Product->image;
         $bill->worker_message = $request->message; 
         $bill->worker_status = "Working"; 
         $bill->bill_status = $Product->name;
         $bill->vehicle_id = $request->vehicle;


         $bill->update();
        return redirect()->back();
    }

     public function delete_subpart($id)
    {
        $bill = Bill::find($id);
        $bill->delete(); 
        return redirect()->back()->with('success','Part Deleted successfully!');
    } 




}