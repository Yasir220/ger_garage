@extends('worker.workermaster')

@section('title', 'Worker')

@section('content')
<div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Edit Parts</h3>
                            <p class="text-subtitle text-muted">Complete all input fields for Editing Part for particular Vehicle.</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('addvehicle_part' ,$id)}}">Parts View</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Parts</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">For Edit Parts</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">

                     <form enctype="multipart/form-data" action="{{route('update_part',$bill->id)}}"  method="post">
                      <div class="form-group field_wrapper">
                        <div class="row">



                           <div class="form-group">
                            <label for="category">Category</label> 
                            <select class="form-control" id="category" required="" name="category">
                              <option>Select Category </option>
                              @php $categories= \App\Category::all() @endphp
                              @foreach($categories as $cat)
                              <option selected="" value="{{$bill->category_id}}" >{{\App\Category::findOrFail($bill->category_id)->name}}</option>
                              <option value="{{$cat->id}}">{{$cat->name}}</option>
                              @endforeach 
                            </select>
                          </div> 

                            <div class="form-group">
                            <label for="sub_category">Sub Category</label>
                            <select class="form-control" id="sub_category" required="" name="sub_category"> 
                               <option selected="" value="{{$bill->Subcategory_id}}" >{{\App\subcategory::findOrFail($bill->Subcategory_id)->name}}</option>
                            </select>
                            </div>


                            <div class="form-group">
                            <label for="product">Products</label>
                            <select class="form-control" id="product" required="" name="product">
                               <option selected="" value="{{$bill->product_id}}" >{{\App\Product::findOrFail($bill->product_id)->name}}</option>
                            </select>
                            </div>

                            

                           <div class="col-md-6">
                              <label for="qnty">Quantity <a href="javascript:void(0);" class="add_button" title="Add field"><i class="fa fa-plus-square"></i></a></label>
                              <div> <input type="number" class="form-control" value="{{$bill->quantity}}" required="" id="qnty" name="qnty" placeholder="Enter Part quantity"> 
                           </div>
                          </div>
 
                          <div class="col-md-12" style="padding-top: 20px;">
                              <label for="size">Worker Descripton</label>
                           <div>
                              <textarea class="form-control" type="text"  id="message"  name="message" placeholder="Enter Discription" placeholder="Enter Product Discription" required rows="3">{{$bill->worker_message}}</textarea>
                           </div>
                          </div>

                          <input type="hidden" id="vehicle" name="vehicle" value="{{$bill->vehicle_id}}" >


                        </div>
                      </div> 

                        {{ csrf_field() }}
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    </div>
              </div>
          </div>
    </section> 
 </div> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div class="row"><div class="col-md-6"><label for="size">Sub Categories</label> <div> <input type="text" class="form-control" required="" id="subcat" name="names[]" placeholder="Sub Category"> </div></div><div class="col-md-6"><label for="size">Image</label><div> <input class="form-control" type="file" name="images[]"> </div> </div><a href="javascript:void(0);" class="remove_button"><i class="fa fa-minus-square"></i></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
    </script>

    <script type="text/javascript">
$(document).ready(function () {

    $("#category").change(function () {
        var id = $(this).val();
        var ajaxurl = '{{route('sub_category', ':id')}}';
        $('#sub_category').empty(); 
        ajaxurl = ajaxurl.replace(':id', id);
        
        $.ajax({
        url: ajaxurl,
        type: "GET",
        success: function(data){
            $data = $(data); 
            console.log($data);
            for(var i=0 ; i< data.length ; i++) {
              $('<option value="'+data[i]['id'] +'">'+ data[i]['name'] +'</option>').appendTo('#sub_category');
            }  
        }   
    });
 });

});
</script>

<script type="text/javascript">
$(document).ready(function () {

    $("#category").change(function () {
        var id = $(this).val();
        var ajaxurl = '{{route('sub_product', ':id')}}';
        $('#product').empty(); 
        ajaxurl = ajaxurl.replace(':id', id);
        
        $.ajax({
        url: ajaxurl,
        type: "GET",
        success: function(data2){
            $data2 = $(data2);
            
            console.log($data2);
            for(var i=0 ; i< data2.length ; i++) {

              $('<option value="'+data2[i]['id'] +'">'+ data2[i]['name'] +'</option>').appendTo('#product'); 
            } 
        }   
    });
 });
});
</script>
    
@endsection