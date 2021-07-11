<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li class="{{ Nav::isResource('/vendor/dashboard') }}">
						<a href="/vendor/dashboard" ><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li class="{{ Nav::isResource('/my-profile') }}">
						<a href="{{ url('/my-profile') }}"><i class="fa fa-user"></i><span>My Profile</span></a></li>
						
						<li >
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="fa fa-list"></i> <span>Categories</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li class="{{ Nav::isResource('/vendor/add-category') }}" ><a href="/vendor/add-category" class="">Add Category</a></li>
									<li class="{{ Nav::isResource('/vendor/view-category') }}"><a href="/vendor/view-category" class="">View Categories</a></li>

								</ul>
							</div>
						</li>

						<li>
							<a href="#subPages1" data-toggle="collapse" class="collapsed"><i class="fa fa-product-hunt"></i> <span>Products</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<div id="subPages1" class="collapse ">
								<ul class="nav">
									<li class="{{ Nav::isResource('/vendor/add-products') }}"><a href="/vendor/add-products" class="">Add Product</a></li>
									<li class="{{ Nav::isResource('/vendor/view-products') }}"><a href="/vendor/view-products" class="">View Products</a></li>

								</ul>
							</div>
						</li>

						<!-- <li>
							<a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="fa fa-first-order"></i> <span>Orders</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<div id="subPages2" class="collapse ">
								<ul class="nav"> -->
									<li class="{{ Nav::isResource('/vendor/view-orders') }}"><a href="/vendor/view-orders" class=""><i class="fa fa-first-order"></i> View Orders</a></li>
									<li class="{{ Nav::isResource('/vendor/reports') }}"><a href="/vendor/reports" class=""><i class="fa fa-file"></i> Reports</a></li>
								<!-- </ul>
							</div>
						</li> -->
		
					</ul>
				</nav>
			</div>
		</div>


<style>
.active {
	background-color:red;
	color:white;
}

</style>