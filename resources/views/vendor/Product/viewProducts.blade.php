@extends('vendor.vendor_layouts.main_layout')
@section('title', 'Products')
@section('content')


@if (session('msg'))
<div class="alert alert-success alert-block" style="width:65%; margin-left:350px; margin-top:70px; margin-bottom:-30px;">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ session('msg') }}</strong>
</div>
@endif


<div class="card" style="margin-left:307px; background-color:white; padding:30px; margin-right:70px; margin-top:30px;">
<!-- <div class="card-header">
<h4>View Prodcuts</h4>
</div> -->

<div class="card-body">
<div class="container-fluid">
    
    <a href="/vendor/add-products" style="margin-left:740px;  "><button class="btn btn-info" style="margin-bottom:20px;">Add New Product</button></a>
    <div class="row-fluid">
      <div class="span12">
<div class="widget-box">
         
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead style="color:white;background-color:black;">
                <tr>
                  <th><h6>Product ID</h6></th>
                  <th><h6>Product Name</h6></th>
                  <th><h6>Category Name</h6></th>
                  <th><h6>Product Price</h6></th>
                  <th><h6>Product Code</h6></th>
                  <th><h6>Product Image</h6></th>
                  <th><h6>View</h6></th>
                  <th><h6>Edit</h6></th>
                  <th><h6>Delete</h6></th>
                </tr>
              </thead>
              <tbody style="background-color:DarkSlateGrey; color:white;">
                  @foreach($products as $product)
                <tr >
                  <td>{{$product->id}}</td>
                  <td>{{$product->product_name}}</td>
                  <td>{{$product->category_name}}</td>
                  <td>{{$product->price}}</td>
                  <td>{{$product->product_code}}</td>
                  <td><img src="{{'/uploads/product/'.$product->image}}" alt="image" style="width:50px; height:50px;"></img></td>
                  <td>

                 
                  <a href="#viewDetails{{$product->id}}" class="btn btn-success" data-toggle="modal" data-target="#viewDetails{{$product->id}}">View</a>
                  <div class="modal fade" id="viewDetails{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <div class="modal-header" style="background-color:#2B333E; color:white;">
        <h3 class="modal-title" id="viewProductLabel">{{$product->product_name}} Details</h3>
      </div>
      <div class="modal-body" style="background-color:#2B333E; color:white;">
<div class="grid-container">
  <div class="grid-item" style="background-color:#2B333E; color:white;">
  <div class="form-group " >
    <label >Name</label>
    <input type="text" class="form-control" style="height:30px; border-radius:3px;" placeholder="Product Name" name="name" required style="height:30px; border-radius:3px;" value="{{$product->product_name}}" >
  </div>

  <div class="form-group " >
    <label >Product Price</label>
    <input type="text" class="form-control" value="{{$product->price}}" style="height:30px; border-radius:3px;" name="price" required >
  </div>

  <div class="form-group " style="padding-bottom:13px;" >
    <label >Under Category</label>
    <input type="text" name="category_id" style="height:30px; border-radius:3px; color:black; width:230px; " value=" {{$product->category_name}}" >
    </div>
   
  
    <div class="form-group " style="padding-bottom:13px;">
    <label >Product Code</label>
    <input type="text" class="form-control" value="{{$product->product_code}}" style="height:30px; border-radius:3px;" placeholder="Enter Product Code" name="product_code" required >
  </div>

  <div class="form-group " style="padding-bottom:13px;">
    <label >Stock</label>
    <input type="text" class="form-control" value="{{$product->stock}}" style="height:30px; border-radius:3px;" disabled placeholder="Out of Stock" name="stock" required >
  </div>
  <div class="form-group">
    <label >Description</label>
    <input type="text" class="form-control" disabled name="descip"  value="{{$product->description}}" style="height:60px; border-radius:3px;">
  </div>



</div>

  <div class="grid-item" style=" color:black;">

  <div class="form-group " >
    <label >Product Image</label>
    <hr>
    <img src="{{'/uploads/product/'.$product->image}}" alt="image" style="width:200px; height:150px;"></img>
  </div>
  <hr>
<br>
  <div class="form-group " >
    <label >Product video</label>
    <hr>
    @if($product->video)
    <video width="200" height="150" controls>
  <source src="{{url('uploads/product/'.$product->video)}}" type="video/mp4">
</video>
@else 
<br>
<span>Add video to view</span>
@endif
  </div>

</div>

</div>

      </div>
      <div class="modal-footer" style="background-color:#2B333E;">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
                  </td>
                  <td>
                  <a href="/vendor/edit-product/{{$product->id}}"><button class="btn btn-warning">Edit</button></a>
                  </td>
                  <td>
                  <form action="/vendor/delete-product/{{$product->id}}" method="POST">
                  @csrf

                  <button class="btn btn-danger" type="submit" onClick="return confirm('Really you want to Delete it?')"
                  >Delete</button>
                  </form>
                  </td>
                </tr> 
                @endforeach

              </tbody>
              
            </table>
        
          </div>
          
        </div>
        <div style="margin-left:600px; ">
          {{ $products->links() }}
          
</div>
</div>

</div>
</div>
</div>
</div>


@endsection

<script type="text/javascript">
function confirm_delete() {
  return confirm('Do you really want to Delete it?');
}
</script>

<script src="text/javascript" >


$(document).ready(function() {
    $("#viewDetails").modal();
  });
</script>

<style>
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto;
  padding: 5px;
}
.grid-item {
  background-color: white;
  padding: 10px 30px 10px 30px;
}
.h6 {
  font-size:16px;
}
</style>

