<?php 

use App\Product;

?>

@extends('frontend.layout')
@section('title', 'Products')
@section('content')

<section style="margin-top:100px;">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
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
											<li><a href="{{asset('/products/'.$subcat->url)}}"><i class="fa fa-star"></i> {{$subcat->name}} ({{$productCount}}) </a></li>
										@endforeach
										</ul>
									</div>
								</div>
							@endforeach
							</div>
							
							
						</div><!--/category-products-->
					
						<!--/brands_products--> 
						
						>
						
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>
				
				<div class="col-sm-8 padding-right" >
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">
						@if(!empty($searchProduct))
						{{$searchProduct}}
						@else
						{{$categoryDetails->name}} 
						@endif
						({{count($productAll)}})
						</h2>
						@foreach($productAll as $product)
						<div class="col-sm-4">
							<div class="product-image-wrapper" >
								<div class="single-products">
										<div class="productinfo text-center" >
											<img src="{{'/uploads/product/'.$product->image}}" alt="" style="height:200px; width:400px; "/>
											<h2 style="height:70px;">{{$product->product_name}}</h2>
											
											<div style="background-color: orange">
											<hr>
											<h4>Rs:{{$product->price}}</h4>
											
											
											<a href="{{url('/product/'.$product->id)}}" class="btn btn-default add-to-cart">View Details</a>
</div>
										</div>
										<div class="product-overlay" >
											<div class="overlay-content">
												<h2>RS: {{$product->price}}</h2>
												<p>{{$product->description}}</p>
												<a href="{{url('/product/'.$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Details</a>
											
											</div>
										</div>
								</div>
							</div>
						
						</div>
						
						@endforeach
						
						
						
					</div><!--features_items-->
					
					<!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
	
@endsection 