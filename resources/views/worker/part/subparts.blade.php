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
                            <h3>Parts View</h3>
                            <p class="text-subtitle text-muted">For Parts use in vehicle repair Detail view.</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('allvehilce_accepted')}}">Vechiles For Repairing</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Parts View</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                    <div class="text-rigth"style="padding-top:40px; padding-left:20px;  ">
                    <label style="padding-right: 40px;">For adding new Part</label> <a href="{{ route('new_subpart',$id) }}" class="btn btn-outline-primary">Add New Part</a>
                         </div>
                       
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Serial No</th>
                                        <th>Part Category</th>
                                        <th>Part Subcategory</th>
                                        <th>Name</th>
										<th>Description</th>
										<th>Price</th>
										<th>Quantity</th>
										<th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody id="SubcatSortable"> 
                                 
                                  @foreach($vehicles as $key => $vehicle)
                                
                                    <tr id="{{$vehicle->id}}"> 
                                        <td class="handle"><a class="btn" style="cursor:move"><i class="bi bi-list"></i></a></td> 
                                        <td>{{ $vehicle->category_id}}</td>  
                                        <td>{{ $vehicle->Subcategory_id}}</td> 
                                        <td>{{ $vehicle->name}}</td> 
                                        <td>{{ $vehicle->description}}</td> 
                                        <td>{{ $vehicle->price}}</td> 
                                        <td>{{ $vehicle->quantity}}</td> 
                                         <td><img src="{{ asset('images/products/' . $vehicle->image)}}"  class="img-resposive"  width="100px" height="60px" ></td>      
                                        <td>  
                                        <a href="{{ route('edit_subpart' ,$vehicle->id) }}" class="btn btn-outline-primary">Edit</a>
                                        <a href="{{ route('delete_subpart' ,$vehicle->id) }}"onclick="return confirm('Are you sure you want to delete this part?');"  class="btn btn-outline-danger">Delete</a>
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

  $( "#SubcatSortable" ).sortable({
        delay: 150,
        stop: function() {
            var selectedData = new Array();
            $('#SubcatSortable>tr').each(function() {
                selectedData.push($(this).attr("id"));
            });
            updateOrder(selectedData);
        }
    }); 
});

function updateOrder(data) {
      var token = document.getElementById('csrf-token').value;
      var ajaxurl = '{{route('sort_subcategory')}}';
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