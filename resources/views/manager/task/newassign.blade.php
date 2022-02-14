@extends('manager.managermaster')
@section('title', 'Manager product')
@section('content')

<div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Edit Vehicle Task Assign</h3>
                            <p class="text-subtitle text-muted">Complete all input fields for Editing the vehicle booking or leave this.</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('requested_task')}}">Vehicle Task Assigned View</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Assigned Task</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">For Assign Task to Worker</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">

                                  <form enctype="multipart/form-data" action="{{ route('task_save' ,$vehicles->id) }}"  method="post">
                                    @method('PUT')
									<div class="form-group">
                                        <label for="name">Customer Name</label>
                                        <input type="text" class="form-control" required="" id="name" name="name"class="form-control" value="{{ $vehicles->name}}" placeholder="Enter Name" readonly>
                                    </div>

                                     <div class="form-group">
                                        <label for="phone">Customer Phone No</label>
                                        <input type="number" class="form-control" required="" id="phone" name="phone" value="{{ $vehicles->phone}}" class="form-control" placeholder="Phone No" readonly>
                                    </div>

 
                                        <div class="form-group">
                                        <label for="vehicle_type">Vehicle Type</label>
                                        <input type="text" class="form-control" required="" id="vehicle_type" name="vehicle_type" value="{{ $vehicles->vehicle_type}}" class="form-control" placeholder="Enter vehicle type" readonly> 
                                        </div>
                                         

                                    

                                    <div class="form-group">
                                        <label for="vehicle_name">Vehicle Name</label>
                                        <input type="text" class="form-control" required="" id="vehicle_name" name="vehicle_name" value="{{ $vehicles->vehicle_name}}" class="form-control" placeholder="Enter Vehicle Name" readonly>
                                    </div>


                                   

                                    <div class="form-group">
                                         <label for="vehicle_engine">Vehicle Engine Type</label>
                                            <input type="text" class="form-control" required="" id="vehicle_engine" name="vehicle_engine" value="{{ $vehicles->vehicle_engine}}" class="form-control" placeholder="Enter vehicle engine" readonly>
                                     
                                    </div>
 

                                    <div class="form-group">
                                        <label for="vehicle_made">Vehicle Made</label>
                                        <input type="text" class="form-control" required="" id="vehicle_made" name="vehicle_made" value="{{ $vehicles->vehicle_made}}" class="form-control" value="{{ $vehicles->name}}" placeholder="Enter Vehicle Made e.g germeny." readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="vehicle_licence">Vehicle Licence Detail</label>
                                        <input type="text" class="form-control" required="" id="vehicle_licence" name="vehicle_licence" value="{{ $vehicles->vehicle_licence}}" class="form-control" placeholder="Enter Vehicle licence." readonly>
                                    </div>

                                     <div class="form-group">
                                         <label for="vehicle_service_category">Vehicle Service Category</label>
                                          <input type="text" class="form-control" required="" id="vehicle_service_category" name="vehicle_service_category" value="{{ $vehicles->vehicle_service_category}}" class="form-control" placeholder="Enter vehicle service Category" readonly>  
                                    </div>
 

                                   

                                    <div class="form-group">
                                        <label for="vehicle_issue">Vehicle issue</label>
                                        <textarea name="vehicle_issue" class="form-control" id="" cols="30" rows="4"  placeholder="Enter Your Issue." readonly></textarea>
                                    </div> 

                                    
                                        <div class="form-group">
                                            <label for="booking_date">Vehicle Booking Date</label>
                                            <input type="text" id="booking_date" class="form-control" name="booking_date"  placeholder="select Booking Date" readonly>
                                        </div>

 
                                        <div class="form-group">
                                            <label for="ending_date">Finish Date</label>
                                            <input type="text" id="ending_date" class="form-control"   name="ending_date" placeholder="Select Finish Date" >
                                        </div>


                                    @php $workers = \App\User::where('role_id','4')->get(); @endphp
                                      <div class="form-group">
                                        <label for="worker_id">Select Worker</label>
                                          <select class="choices form-select" name="worker_id"  > 

                                            @foreach($workers as $key => $worker)
                                            <option value={{ $worker->id }}>{{ $worker->name}}</option>
                                            @endforeach
                                            
                                          </select>
                                        </div>
                                        

                                        <div class="form-group">
                                            <label for="manager_message">Manager Message</label>
                                            <textarea name="manager_message" class="form-control" id="" cols="30" rows="4"  placeholder="Enter Manager Message" >{{ $vehicles->manager_message}}</textarea>
                                        </div>  
                                   
                                      
                                    {{ csrf_field() }}
                                     <button type="submit" class="btn btn-primary">Submit</button>

                                     </div>

                                  </form>

                                 
                            </div>
                        </div>
                    </div>
                </section>
  
            </div> 
@endsection