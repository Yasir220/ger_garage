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
                            <h3>Bill View</h3>
                            <p class="text-subtitle text-muted">For Parts use in vehicle repair Bill view.</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('allvehilce_bill')}}">Vechiles For Bills</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Bill View</li>
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
                                        <th>Part Category</th>
                                        <th>Part Subcategory</th>
                                        <th>Name</th>
										<th>Description</th>
										<th>Price</th>
										<th>Quantity</th>
										<th>Image</th> 
                                    </tr>
                                </thead>

                                <tbody id="SubcatSortable"> 
                                    @php $qnty = 0; $total_price = 0; @endphp
                                 
                                  @foreach($bills as $key => $bill)
                                
                                    <tr id="{{$bill->id}}">  
                                        <td>{{ $key }}</td>  
                                        <td>{{ $bill->category_id}}</td>  
                                        <td>{{ $bill->Subcategory_id}}</td> 
                                        <td>{{ $bill->name}}</td> 
                                        <td>{{ $bill->description}}</td> 
                                        <td>{{ $bill->price}}</td> 
                                        <td>{{ $bill->quantity}}</td> 
                                         <td><img src="{{ asset('images/products/' . $bill->image)}}"  class="img-resposive"  width="100px" height="60px" ></td>   
                                    </tr> 
                                     @php     $total_price += $bill->quantity * $bill->price ;
                                          $qnty += $bill->quantity;  @endphp
                                @endforeach


                                     <tr id="{{$bill->id}}">  
                                        <td>Total Product : </td>  
                                        <td></td>
                                        <td></td>  
                                        <td></td>
                                        <td>{{ $qnty }}</td>  
                                    </tr> 

                                    <tr id="{{$bill->id}}">  
                                        <td><b>Total Bill : </b></td>   
                                        <td></td>
                                        <td></td>
                                        <td></td> 
                                        <td><b>{{ $total_price }}</b></td>  
                                    </tr> 

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