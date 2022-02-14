@extends('manager.managermaster')

@section('title', 'Manager product')

@section('content')

<div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Add Product</h3>
                            <p class="text-subtitle text-muted">Complete all input fields for adding the Product.</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('productss')}}">Products</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">For Add Product</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
 
       
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

 <form  action="products/store" enctype="multipart/form-data" method="post">

  <div class="form-group">
    <label for="name">Name</label>
    <input  type="text" class="form-control" required="" id="name" name="name" placeholder="Enter Product Name">  
    </div>
    <div class="form-group">
        <label for="code">Serial Code Name</label>
        <input  type="text" class="form-control" required="" id="code" name="code" placeholder="Enter Product Serial Name">  
    </div>
  
   
  <div class="form-group">
    <label for="discription">Description</label> 
    <textarea class="form-control" type="text"  id="discription" name="discription" placeholder="Enter Product Discription" rows="3"></textarea>
  </div>

  <div class="form-group">
    <label for="category">Category</label> 
    <select class="form-control" id="category" required="" name="category">
      <option>Select Category </option>
      @foreach($category as $cat)
      <option value="{{$cat->id}}">{{$cat->name}}</option>
      @endforeach 
    </select>
  </div> 

    <div class="form-group">
    <label for="sub_category">Sub Category</label>
    <select class="form-control" id="sub_category" required="" name="sub_category"> 
    </select>
    </div>
 

  <div class="form-group">
    <label for="qty">Product Image</label>
    <input type="file" class="form-control" id="image"  required="" name="image">  
  </div>
 
  
  <div class="form-group">
        <div class="row">
            <div class="col-md-4">
            <label for="price">Price</label>
            <input  type="number" class="form-control" required="" id="price" name="price" placeholder="Enter Product buy price">
            </div>

            <div class="col-md-4">
                <label for="sale_price">Sale Price</label>
                <input  type="number" class="form-control" required="" id="sale_price" name="sale_price" placeholder="Enter Product sale price">
            </div> 

        <div class="col-md-4">
        <label for="prod_qty">Product Quantity</label>
        <input  type="number" class="form-control" required="" id="prod_qty" name="prod_qty" placeholder="Enter Product Quantity to add.">
        </div>

        </div> 
  </div>
 

    
   
   <div class="form-group">
    <label for="terms_conditions">Tearms And Conditions</label> 
    <textarea class="form-control" type="text"  id="terms_conditions" name="terms_conditions" placeholder="Enter Product terms & conditions" rows="3"></textarea>
   </div>

  

<div class="form-group">
  
    <div class="row"> 

        <div class="col-md-4"  > 
            <label><input type="checkbox" name="taxable" value="taxable"> taxable</label>
        </div>
       
        <div class="col-md-4"  > 
            <label><input type="checkbox" name="status" value="status"> Active</label>
        </div>


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
  
	
@endsection