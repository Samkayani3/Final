
		<!-- Dropdown Structure -->
    <!-- <ul id="dropdown1" class="dropdown-content">
<li><a href="/my-profile"><i class="fa fa-user fa-fw"></i> My Profile</a>
</li>
<li>
<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
<i class="fa fa-sign-out fa-fw"></i>  Logout
</a>    
<form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>  


</li>
</ul>
</div>  -->

<nav class="navbar navbar-default navbar-fixed-top" style="background-color:#2B333E; color:white; height:70px; decoration:none;">
			<div class="brand" style="width:260px; background-color:red;height:95px; margin-top:-25px; " >
            <a href="/vendor/dashboard" style="color: white; text-decoration:none;"><h3>Farmer's Market  </h3> </a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<form class="navbar-form navbar-left">
					<div class="input-group" style="margin-top:15px;">
						<input type="text" value="" class="form-control" placeholder="Search dashboard...">
						<span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
					</div>
				</form>
				<div id="navbar-menu">
				<ul class="nav navbar-nav navbar-right" style="margin-top:15px; text-decoration:none;">
						
						<li class="dropdown" style="text-decoration:none;">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:white; text-decoration:none;" onClick=""> <span >{{Auth::user()->name}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="/my-profile"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
								<li>
								<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();   document.getElementById('logout-form').submit();"><i class="lnr lnr-exit"></i> {{ __('Logout') }} </a>  
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">  @csrf</form>
								<!-- <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="lnr lnr-exit"></i> <span>Logout</span></a> -->
								
								</li>
							</ul>
						</li>
						
					</ul>
				</div>
			</div>
		</nav>