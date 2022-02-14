@extends('worker.workermaster')
@section('title', 'Worker')
@section('content')

<div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Edit Vehicle Detail</h3>
                            <p class="text-subtitle text-muted">Complete all input fields for Editing the vehicle booking or leave this.</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('vehicless')}}">Vehicle booking View</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Vehicle</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">For Add Media links</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">

                                  <form enctype="multipart/form-data" action="{{ route('vehicle_update' ,$vehicles->id) }}"  method="post">
                                    @method('PUT')
   <div class="form-group">
                                        <label for="name">Customer Name</label>
                                        <input type="text" class="form-control" required="" id="name" name="name"class="form-control" value="{{ $vehicles->name}}" placeholder="Enter Name">
                                    </div>

                                     <div class="form-group">
                                        <label for="phone">Customer Phone No</label>
                                        <input type="number" class="form-control" required="" id="phone" name="phone" value="{{ $vehicles->phone}}" class="form-control" placeholder="Phone No">
                                    </div>

 
                                        <div class="form-group">
                                        <label for="vehicle_type">Vehicle Type</label>
                                          <select class="choices form-select" name="vehicle_type"  >
                                            <option value={{ $vehicles->vehicle_type}}">{{ $vehicles->vehicle_type}}</option>
                                            <option value="MotorBike">MotorBike</option>
                                            <option value="Cars">Cars</option>
                                            <option value="Small Van">Small Vans</option>
                                            <option value="Small Buses">Small Buses</option>
                                          </select>
                                        </div>
                                         

                                    

                                    <div class="form-group">
                                        <label for="vehicle_name">Vehicle Name</label>
                                        <input type="text" class="form-control" required="" id="vehicle_name" name="vehicle_name" value="{{ $vehicles->vehicle_name}}" class="form-control" placeholder="Enter Vehicle Name">
                                    </div>


                                   

                                    <div class="form-group">
                                         <label for="vehicle_engine">Vehicle Engine Type</label>
                                      <select class="choices form-select" name="vehicle_engine">
                                        <option value="{{ $vehicles->vehicle_engine}}">{{ $vehicles->vehicle_engine}}</option>
                                        <option value="diesel">Diesel</option>
                                        <option value="pertol">Pertol</option>
                                        <option value="hybrid">Hybrid</option>
                                        <option value="electric">Electric</option>
                                      </select>
                                    </div>
 

                                    <div class="form-group">
                                        <label for="vehicle_made">Vehicle Made</label>
                                        <input type="text" class="form-control" required="" id="vehicle_made" name="vehicle_made" value="{{ $vehicles->vehicle_made}}" class="form-control" value="{{ $vehicles->name}}" placeholder="Enter Vehicle Made e.g germeny.">
                                    </div>

                                    <div class="form-group">
                                        <label for="vehicle_licence">Vehicle Licence Detail</label>
                                        <input type="text" class="form-control" required="" id="vehicle_licence" name="vehicle_licence" value="{{ $vehicles->vehicle_licence}}" class="form-control" placeholder="Enter Vehicle licence.">
                                    </div>

                                     <div class="form-group">
                                         <label for="vehicle_service_category">Vehicle Service Category</label>
                                      <select class="choices form-select" name="vehicle_service_category">
                                        <option value="{{ $vehicles->vehicle_service_category}}">{{ $vehicles->vehicle_service_category}}</option>
                                        <option value="Annual Service">Annual Service</option>
                                        <option value="Major Service">Major Service</option>
                                        <option value="Repair">Repair</option>
                                        <option value="Major Repair">Major Repair</option>
                                      </select>
                                    </div>
 

                                    <div class="form-group">
                                        <label for="booking_date">Vehicle Booking Date</label>
                                        <input type="text" id="booking_date" class="form-control" name="booking_date" value="{{ $vehicles->booking_date}}" placeholder="select Booking Date">
                                    </div>

                                    <div class="form-group">
                                        <label for="vehicle_issue">Vehicle issue</label>
                                        <textarea name="vehicle_issue" class="form-control" id="" cols="30" rows="4"  placeholder="Enter Your Issue.">{{ $vehicles->vehicle_issue}}</textarea>
                                    </div>
                                      
                                      <input type="hidden" id="status" class="form-control" name="status" value="Progress">
                                      
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