<?php 

use App\Product;

?>

@extends('frontend.layout')
@section('title', 'Home')
@section('content')

<div id="carousel-example-2" class="carousel slide mx-auto"  data-ride="carousel" data-interval="4000" >
    
    <ol class="carousel-indicators" style="margin-left:-20px;">
    <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-2" data-slide-to="1"></li>
    <li data-target="#carousel-example-2" data-slide-to="2"></li>
  </ol>
 
	<div class="carousel-inner" style="margin-top:20px;">
		<div class="item active">
      <div>
        <img  src="https://www.bentoli.com/wp-content/uploads/2017/07/CommercialFarming-1.jpg"
          alt="First slide" style="height:450px; width:100%;"> </img>
     </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">Farmer's Maket</h3>
        <p>An Agriculture based Market</p>
      </div>
	</div>

  <div class="item">
      <!--Mask color-->
      <div class="view">
        <img src="https://blogs.worldbank.org/sites/default/files/blogs-images/2019-09/digital_agriculture3.jpg"
          alt="Second slide" style="height:450px;  width:100%;">
        
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">Farmer's Market</h3>
        <p>Online Shop for farmers</p>
      </div>
    </div>

    <div class="item">
      <!--Mask color-->
      <div class="view">
        <img  src="https://youmatter.world/app/uploads/sites/2/2018/10/climate-change-definition-meaning.jpg"
          alt="Third slide" style="height:450px;  width:100%;">
        
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">Farmer's Market</h3>
        <p>An Agriculture based Website</p>
     </div>
      
   </div>
  
    
  </div>
  

</div>
	

<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Categories</h2>
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
						
						<!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Products</h2>
						@foreach($products as $product)
						<div class="col-sm-4">
							<div class="product-image-wrapper" >
								<div class="single-products">
										<div class="productinfo text-center" >
											<img src="{{'/uploads/product/'.$product->image}}" alt="" style="height:200px;"/>
											<h2 style="height:70px;">{{$product->product_name}}</h2>
											
											<div style="background-color: orange">
											<hr>
											<h4>Rs:{{$product->price}}</h4>
											
											<a href="{{url('/product/'.$product->id)}}" class="btn btn-default add-to-cart">View Details</a>
</div>
										</div>
										<div class="product-overlay" >
											<div class="overlay-content">
												<h2>RS: {{$product->price}} </h2>
												<p>{{$product->description}}</p>
												<a href="{{url('/product/'.$product->id)}}" class="btn btn-default add-to-cart">View Details</a>
											
											</div>
										</div>
								</div>
							</div>
						
						</div>
						
						@endforeach
						
						
						
					</div><!--features_items-->
					{{$products->links()}}
					<!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
	
@endsection 

<style>
a {
  text-decoration: none;
  display: inline-block;
  padding: 8px 16px;

}

a:hover {
  background-color: #ddd;
  color: black;
  text-decoration: none;
}

.previous {
  background-color: #f1f1f1;
  color: black;
}

.next {
  background-color: #f1f1f1;
  color: black;
}

.round {
  border-radius: 100%;
}  
  </style>

<script type="javascript">
$('.carousel').carousel({
  interval: false
})
</script>