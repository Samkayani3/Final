@extends('frontend.layout')
@section('title', 'Thanks')
@section('content')

<section id="cart_items">
		<div class="container" style="margin-top:50px;">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Thanks</li>
				</ol>
			</div>
			<?php $s_amount = 0; ?>
            <div class="row" >
					<div class="col-sm-6 clearfix" style="width:65%; margin-left:17%; " >
                  <div style="text-align:center;">
                  <h2 style="color:orange;">Thanks for Choosing Farmer's Market</h2>
                  <h3>Your Order ID is: {{Session::get('order_id')}} </h3>
                  <h4>Your Order Amount is Rs: {{Session::get('total_amount')}}  </h4>
				  @if(Session::get('total_amount') <= 500)
				  <h4>Sgipping Charges: Rs:<?php $s_amount = 0; ?>Free Shipping  </h4>

									@elseif(Session::get('total_amount') > 500 && Session::get('total_amount') <= 1000 )
									<h4>Sgipping Charges: Rs:<?php $s_amount = 100; ?>100  </h4>

									@elseif(Session::get('total_amount') > 1000 && Session::get('total_amount') <= 1500)
									<h4>Sgipping Charges: Rs:<?php $s_amount = 150; ?>150  </h4>

									@elseif(Session::get('total_amount') > 1500 && Session::get('total_amount') <= 2000)
									<h4>Sgipping Charges: Rs:<?php $s_amount = 200; ?>200  </h4>

									@elseif(Session::get('total_amount') > 2000 && Session::get('total_amount') <= 2500)
									<h4>Sgipping Charges: Rs:<?php $s_amount = 250; ?>250  </h4>

									@elseif(Session::get('total_amount') >= 2500 && Session::get('total_amount') <= 3000)
									<h4>Sgipping Charges: Rs:<?php $s_amount = 300; ?>300  </h4>
									
									@elseif(Session::get('total_amount') > 3000 && Session::get('total_amount') <= 3500)
									<h4>Sgipping Charges: Rs:<?php $s_amount = 350; ?>350  </h4>
									
									@elseif(Session::get('total_amount') > 3500 && Session::get('total_amount') <= 4000)
									<h4>Sgipping Charges: Rs:<?php $s_amount = 400; ?>400  </h4>

									@elseif(Session::get('total_amount') > 4000 && Session::get('total_amount') <= 4500)
									<h4>Sgipping Charges: Rs:<?php $s_amount = 450; ?>450 </h4>

									@elseif(Session::get('total_amount') > 4500 && Session::get('total_amount') <= 5000)
									
								

									@else
			
									<h4>Sgipping Charges: Rs: <?php $s_amount = 500; ?>500  </h4>
								
								
									@endif
									<?php $t_amount = Session::get('total_amount')+$s_amount; ?> 
									<h4>Total Amount:<?php echo $t_amount; ?> <h4>
									

				  <p>For more Details of Your Order <a href="/user-orders">Click Here</a> </p>
                 
				  
                  
</div>
        </div>
        </div>
@endsection

<?php 
Session::forget('order_id');
Session::forget('total_amount');
Session::forget('s_amount');

?>
