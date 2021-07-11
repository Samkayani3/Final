@extends('vendor.vendor_layouts.main_layout')

@section('content')


<div class="card" style="margin-left:350px; background-color:#2B333E;color:white; padding:30px; margin-right:150px; margin-top:30px;">
<div class="card-header">
<h3>Edit Product</h3>
<hr>
</div>
<div class="card-body">
<div class="container-fluid">
<a href="/vendor/view-products" style="margin-left:650px; "><button class="btn btn-primary" style="margin-bottom:10px;">Back</button></a>

<form action="/vendor/update-product/{{$products->id}}" method="POST" enctype="multipart/form-data">
@csrf
<div class="grid-container">
  <div class="grid-item">
  <div class="form-group " >
    <label >Name</label>
    <input type="text" class="form-control" style="height:30px; border-radius:3px;" placeholder="Product Name" name="name" required style="height:30px; border-radius:3px;" value="{{$products->product_name}}">
  </div>

  <div class="form-group " >
    <label >Product Price</label>
    <input type="text" class="form-control" style="height:30px; border-radius:3px;" placeholder="Enter Product Price" name="price" required value="{{$products->price}}">
  </div>

  <div class="form-group " style="padding-bottom:13px;">
    <label >Stock</label>
    <input type="text" class="form-control" style="height:30px; border-radius:3px;"  name="stock" required value="{{$products->stock}}">
  </div>

  <div class="form-group">
    <label >Description</label>
    <input type="text" class="form-control"  name="descip"  value="{{$products->description}}" style="height:60px; border-radius:3px;">
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-primary"> Submit </button>
  </div>

</div>

  <div class="grid-item" >

  <div class="form-group "  >
    <label >Under Category</label>
    <select name="category_id" style="height:30px; border-radius:3px; " class="form-control" >
    <?php echo $categories_dropdown; ?>
    </select>
    </div>
   
  
    <div class="form-group " >
    <label >Product Code</label>
    <input type="text" class="form-control" style="height:30px; border-radius:3px;" placeholder="Enter Product Code" name="product_code" required value="{{$products->product_code}}">
  </div>


  <div class="form-group " >
    <label >Product Image</label><br>
    <img src="{{'/uploads/product/'.$products->image}}" alt="image" style="width:330px; height:230px; background-color:white;  "></img>
    <input type="file" class="form-control" name="image" value="{{$products->image}}" style="background-color:#2B333E;border:none;" >
    
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
  background-color:#2B333E;
  color:white;
  padding: 10px 30px 10px 30px;
}


</style>