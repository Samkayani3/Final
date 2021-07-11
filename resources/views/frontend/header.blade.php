<?php 
use App\Http\Controllers\Controller;
use App\Product;
$mainCategories = Controller::mainCategories();
$cartCount = Product::cartCount();

?>

<header id="header" style="margin-bottom:-60px;"  ><!--header-->
		<div class="header_top" ><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills" >
								<li><a href=""><i class="fa fa-phone"></i> 0900-78601</a></li>
								<li><a href=""><i class="fa fa-envelope"></i> farmersmarket@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="https://www.facebook.com/Samkayani100/"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://twitter.com/samkayani3"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								
							</ul>
							
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle" style="margin-bottom:-15px;" ><!--header-middle-->
			<div class="container">
				<div class="row">
				<div class="col-sm-6">
		
				</div>
					<div class="col-sm-6" >
						<div class="shop-menu pull-right">
						  <div class="logo pull-left check" style="margin-left:-200px; ">
							<a href="/home">Farmer's Market <img src="{{asset('/images/backend_images/trans_logo.png')}}" alt="" style="height:72px; margin:5px; decoration:none;"/></a>
						  </div>
							<ul class="nav navbar-nav" style="margin-right:35px;">
								<li style="margin-right:10px;"><a href="/account"><i class="fa fa-user"></i> Account</a></li>
								
								<li style="margin-right:10px;"><a href="/checkout"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li style="margin-right:10px;"><a href="/cart"><i class="fa fa-shopping-cart"></i> Cart ({{$cartCount}})</a></li>
							
								<li class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">{{Auth::user()->name}}</span><b class="caret"></b></a>
                                 <ul class="dropdown-menu"></li>
                                 <li><a href="/account"><i class="fa fa-user"></i> My Profile</a></li>
       
        <!-- <li class="divider"></li> -->
        <li><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
     </li>
      </ul>
   
	</ul>
	</li>
	</div>
        <!-- <li class="divider"></li> -->
       
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	</div>
	
		<div class="header-bottom" style="background-color:black; color:white; height:100px;"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li class="{{ Nav::isResource('/home') }}"><a href="{{ url('/home') }}" >Home</a></li>
								<li class="dropdown {{ Request::is('#') ? 'active' : '' }}"><a href="#">Categories<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu ">
									@foreach($mainCategories as $cat)
                                        <li ><a href="{{asset('products/'.$cat->url)}}">{{$cat->name}}</a></li>
										@endforeach
                                    </ul>
                                </li>
								
								<li class="{{ Request::is('//user-orders') ? 'active' : '' }}"><a href="/user-orders">My Orders</a></li>
								<li><a href="contact-us.html">Contact</a></li>
							</ul>
						</div>
					</div>
				

					<div class="col-sm-3">
						<div class="search_box pull-right">
							<form action="{{url('/search-products') }}" method="POST">
							@csrf
							<input type="text" placeholder="Search Products" style="height:30px;" name="productSerach">
						</form>
						</div>
					</div>
					
				</div>
				<div >
						<div class="">
							<input type="text" style="margin-top:-30px; margin-bottom:-30px; background-color:black; border:none;"/>
						</div>
					</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

<style>
.header_top{
background-color:red;
font-size:16px;
color:white;
}
.active {
	
}


</style>