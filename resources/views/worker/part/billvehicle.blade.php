@extends('worker.workermaster')
@section('title', 'Worker')
@section('SpecificStyles')
<link rel="stylesheet" href="{{ asset('assets/admin/assets/vendors/simple-datatables/style.css')}}">
@stop

@section('content')


<div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Bill for Vehicles</h3>
                            <p class="text-subtitle text-muted">For view the bills of vehicles.</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('worker.login')}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Bill for Vehicles</li>
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
                                        <th>Vehicle Owner Name</th> 
                                        <th>Vehicle type</th>
                                        <th>Vehicle Name</th>
                                        <th>Vehicle Engine</th>
                                        <th>Vehicle Made</th>
                                        <th>Vehicle Licence</th>
                                        <th>Vehicle Service Category</th>
                                        <th>Booking Date</th>
                                        <th>Finish Date</th>
                                        <th>Vehicle Issue</th>
                                        <th>Manager Message</th>  
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody id="MediaSortable">
                                
                                  
                                @foreach($vehicles as $key => $vehicle)
                                
                                    <tr id="{{$vehicle->id}}"> 
                                        <td class="handle"><a class="btn" style="cursor:move"><i class="bi bi-list"></i></a></td> 
                                        <td>{{ $vehicle->name}}</td>  
                                        <td>{{ $vehicle->vehicle_type}}</td> 
                                        <td>{{ $vehicle->vehicle_name}}</td> 
                                        <td>{{ $vehicle->vehicle_engine}}</td> 
                                        <td>{{ $vehicle->vehicle_made}}</td> 
                                        <td>{{ $vehicle->vehicle_licence}}</td> 
                                        <td>{{ $vehicle->vehicle_service_category}}</td> 
                                        <td><span class="badge bg-secondary">{{ $vehicle->booking_date}}</span></td> 
                                        <td><span class="badge bg-danger">{{ $vehicle->ending_date}}</span></td>  
                                        <td>{{ $vehicle->vehicle_issue}}</td>
                                        <td>{{ $vehicle->manager_message }}</td>           

                                        <td>  
                                        <a href="{{ route('view_bill' ,$vehicle->id) }}"  class="btn btn-outline-primary">Bill view</a>  </td>
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
