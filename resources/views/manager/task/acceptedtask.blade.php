@extends('manager.managermaster')
@section('title', 'Manager product')
@section('SpecificStyles')
<link rel="stylesheet" href="{{ asset('assets/admin/assets/vendors/simple-datatables/style.css')}}">
@stop

@section('content')


<div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Accepted Vehicle </h3>
                            <p class="text-subtitle text-muted">For view the accepted vehicle requests.</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('manager.login')}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Accepted Vehicle</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                       
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Serial No</th>
                                        <th>User Id</th>
                                        <th>User Name</th>
                                        <th>Phone</th>
                                        <th>Vehicle type</th>
                                        <th>Vehicle Name</th>
                                        <th>Vehicle Engine</th>
                                        <th>Vehicle Made</th>
                                        <th>Vehicle Licence</th>
                                        <th>Vehicle Service Category</th>
                                        <th>Booking Date</th>
                                        <th>Vehicle Issue</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody id="MediaSortable">
                                
                                  
                                @foreach($vehicles as $key => $vehicle)
                                
                                    <tr id="{{$vehicle->id}}"> 
                                        <td class="handle"><a class="btn" style="cursor:move"><i class="bi bi-list"></i></a></td>
                                        <td>{{ $vehicle->user_id }}</td> 
                                        <td>{{ $vehicle->name}}</td> 
                                        <td>{{ $vehicle->phone}}</td> 
                                        <td>{{ $vehicle->vehicle_type}}</td> 
                                        <td>{{ $vehicle->vehicle_name}}</td> 
                                        <td>{{ $vehicle->vehicle_engine}}</td> 
                                        <td>{{ $vehicle->vehicle_made}}</td> 
                                        <td>{{ $vehicle->vehicle_licence}}</td> 
                                        <td>{{ $vehicle->vehicle_service_category}}</td> 
                                        <td>{{ $vehicle->booking_date}}</td> 
                                        <td>{{ $vehicle->vehicle_issue}}</td> 
                                        

                                        @if ( $vehicle->status == "Request")
                                            <td><span class="badge bg-secondary">Requested</span></td>
                                        @elseif ( $vehicle->task_status == "Assigned" )
                                           <td><span class="badge bg-info">Assigned</span></td>
                                        @elseif ( $vehicle->status == "Hold" )
                                           <td><span class="badge bg-warning text-black">On Hold</span></td>
                                        @elseif ( $vehicle->status == "Pending" )
                                             <td><span class="badge bg-primary">Payment Pending</span></td>
                                        @elseif ( $vehicle->status == "Complete" )
                                             <td><span class="badge bg-success">Complete</span></td>
                                        @else
                                             <td><span class="badge bg-danger">Rejected</span></td>
                                        @endif

                                        

                                        <td>  
                                        <a href="{{ route('reject_request' ,$vehicle->id) }}"onclick="return confirm('Are you sure you want to Reject this Request?');"  class="btn btn-outline-danger">Reject</a>
                                        </td>
                                    </tr> 
                                @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                </section>
            </div>
 
@endsection


@section('specificscripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{ asset('assets/admin/assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>



<script type="text/javascript">
$(document).ready(function(){
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
}); 

  $( "#MediaSortable" ).sortable({
     
        delay: 150,
        stop: function() {
            var selectedData = new Array();
            $('#MediaSortable>tr').each(function() {
                selectedData.push($(this).attr("id"));
            });
            updateOrder(selectedData);
        }
    }); 
});

function updateOrder(data) {
      var token = document.getElementById('csrf-token').value;
      var ajaxurl = '{{route('sort_media')}}';
      var data = {'data' : data , '_token' : token};
      console.log(data);
        $.ajax({
            url:ajaxurl,
            type:'post',
            data:data,
            success:function(data){
               console.log(data);
                // alert('your change successfully saved');
            }
        })
    }
</script>
@stop
