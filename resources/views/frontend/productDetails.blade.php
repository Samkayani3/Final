<?php 

use App\Product;

?>

@extends('frontend.layout')
@section('title', 'Product Details')
@section('content')

<section style="margin-top:100px;">
		<div class="container">
			<div class="row">
			@if (session('msg'))
<div class="alert alert-danger alert-block" style="width:70%; margin-left:28%; ">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ session('msg') }}</strong>
</div>
@endif
@if (session('msg1'))
<div class="alert alert-success alert-block" style="width:70%; margin-left:28%; ">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ session('msg1') }}</strong>
</div>
@endif
            <div class="col-sm-3" >
					<div class="left-sidebar" >
						<h2 >Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								@foreach($categories as $category)
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#{{$category->id}}">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											{{$category->name}}
										
										</a>
									</h4>
								</div>
								
								<div id="{{$category->id}}" class="panel-collapse collapse">
									<div class="panel-body">
										
										<ul>
										@foreach($category->categories as $subcat)
										<?php $productCount = Product::productCount($subcat->id); ?>
											<li><a href="{{asset('/products/'.$subcat->url)}}"><i class="fa fa-star"></i> {{$subcat->name}}({{$productCount}}) </a></li>
										@endforeach
										</ul>
									</div>
								</div>
							@endforeach
							</div>
							
							
						</div><!--/category-products-->
					
						<!--/brands_products--> 
						
						
						
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{'/uploads/product/'.$productDetails->image}}" alt="" style="width:400px; height:300px;" />
								
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								   

								  <!-- Controls -->
								  
							</div>

						</div>
						<div class="col-sm-7">
						<form name="addtocartForm" id="addtocarForm" action="{{url('add-cart')}}" method="POST">
						@csrf
						<input type="hidden" name="product_id" value="{{$productDetails->id}}" >

						<input type="hidden" name="product_name" value="{{$productDetails->product_name}}" >

						<input type="hidden" name="product_code" value="{{$productDetails->product_code}}" >
						<input type="hidden" name="price" value="{{$productDetails->price}}" >
						<input type="hidden" name="quantity" value="{{$productDetails->quantity}}">

						

							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{$productDetails->product_name}}</h2>
								<p>Code:{{$productDetails->product_code}} </p>
								
								<span>
									<span>RS: {{$productDetails->price}}</span>
									
									<label>Quantity:</label>
									@if($productDetails->stock>0)
									<!--<input type="text" name="quantity" value="1" /> -->
									<!-- <select name="quantity" style="width:60px;">
										<option value="1">1</option> 
                                        <option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
									
									</select> -->
									
									 <div class="cart_quantity_button">
									 <span class="input-group-btn">
									<button class="cart_quantity_up" type="button" onclick="buttonClick();" > + </button>
									</span>
								
									<input class="cart_quantity_input" id="inc" type="text" name="quantity" value="1" autocomplete="off" size="2" style="width:50px; height:27px; font-size:16px;">
									<span class="input-group-btn">
									<button  class="cart_quantity_down" type="button" onclick="Dec();" > - </a>
									</span>
								   
								</div>
									 
									
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
									
								</span>
								
								<p><b>Availability:</b> In Stock</p>
								@else 
								<br>
								<span style="color:red; font-size:18px;">Out of Stock</span>
								
								@endif
	
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</form>
						</div>
					</div><!--/product-details-->
					
                    <div class="category-tab shop-details-tab" ><!--category-tab-->
						<div class="col-sm-12" style="border:1px solid;">
		

                            <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#description">Description</a></li>
                            <li><a data-toggle="tab" href="#delivery">Delivery Option</a></li>
							<li><a data-toggle="tab" href="#video">Product Video</a></li>
                            </ul>

                          <div class="tab-content" style="padding-left:20px; color:black;">
                            <div id="description" class="tab-pane fade in active" style="color:black;">
                            <h4>{{$productDetails->product_name}}</h4>
                              <p>{{$productDetails->description}}</p>
							  
                            </div>

                            <div id="delivery" class="tab-pane fade" style="color:black;">
                            <h6>100% Original Product</h6>
                            <p>Cash On Delivery</p>
                          </div>
						  <div id="video" class="tab-pane fade" style="color:black;">
						  @if($productDetails->video)
						  <video width="800" height="400" controls>
  <source src="{{url('uploads/product/'.$productDetails->video)}}" type="video/mp4">
</video>
                        @else
						<p>No video added by Seller</p>
						@endif

                          </div>

						</div>
					</div>
</div>

					<!--/category-tab-->
				
					
				</div>
			</div>
		</div>
	</section>
	

@endsection


<script>
    var i = 1;
    function buttonClick() {
        i++;
        document.getElementById('inc').value = i;
    }
	function Dec() {
        i--;
        document.getElementById('inc').value = i;
    }
</script>