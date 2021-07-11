@extends('vendor.vendor_layouts.main_layout')

@section('content')


<div class="card" style="margin-left:350px; background-color:#2B333E; padding:20px; margin-right:150px; margin-top:30px;">
<div class="card-header" style="color:white;">
<h3>Add Product</h3>

</div>
<hr>
<div class="card-body">
<div class="container-fluid">
<form action="{{URL('/vendor/store-products')}}" method="POST" enctype="multipart/form-data">
@csrf
<div class="grid-container">
  <div class="grid-item">
  <div class="form-group " >
    <label >Name</label>
    <input type="text" class="form-control" style="height:30px; border-radius:3px;" placeholder="Product Name" name="name" required style="height:30px; border-radius:3px;">
  </div>

  <div class="form-group " >
    <label >Product Price</label>
    <input type="text" class="form-control" style="height:30px; border-radius:3px;" placeholder="Enter Product Price" name="price" required>
  </div>

  <div class="form-group " style="padding-bottom:13px;">
    <label >Stock</label>
    <input type="text" class="form-control" style="height:30px; border-radius:3px;" placeholder="Enter Stock" name="stock" required>
  </div>

  <div class="form-group">
    <label >Description</label>
    <textarea class="form-control"  rows="3" name="descip" required></textarea>
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-primary"> Submit </button>
  </div>

</div>

  <div class="grid-item" >

  <div class="form-group " style="padding-bottom:13px;" >
    <label >Under Category</label>
    <select class="form-control" name="category_id" style="height:30px; border-radius:3px; ">
    <?php echo $categories_dropdown; ?>
    </select>
    </div>
  
    <div class="form-group " style="padding-bottom:13px;">
    <label >Product Code</label>
    <input type="text" class="form-control" style="height:30px; border-radius:3px;" placeholder="Enter Product Code" name="product_code" required>
  </div>


  <div class="form-group " style="padding-bottom:13px;">
    <label >Shipping Charges</label>
    <input type="text" class="form-control" style="height:30px; border-radius:3px;" placeholder="Enter Charges" name="charges" required>
  </div>

  <div class="form-group " >
    <label >Product Image</label>
    <input type="file" class="form-control" name="image" style="background-color:#2B333E; color:white; border:none;" required >
  </div>
  
  <div class="form-group " >
    <label >Product Video</label>
    <input type="file" class="form-control" name="video" style="background-color:#2B333E; color:white; border:none;" onClick="alert('Video size must be less than 2MB')" >
  </div>

</div>
</div>
</form>

</div>
</div>
</div>

@endsection

<style>
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto;
  padding: 5px;
}
.grid-item {
  background-color: #2B333E;
  color:white;
  padding: 10px 30px 10px 30px;
}


</style>