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

            <div class="row" >
					<div class="col-sm-6 clearfix" style="width:65%; margin-left:17%; " >
                  <div style="text-align:center;">
                  <h2 style="color:orange;">Thanks for Choosing Farmer's Market</h2>
                  <h3>Your Order ID is: {{Session::get('order_id')}} </h3>
                  <h4>Your Order Total Amount is Rs: {{Session::get('total_amount')}}  </h4>
				  <p>Click Buy Now button to make payment </p>
                  <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                     <input type="hidden" name="cmd" value="_s-xclick">
                     <input type="hidden" name="hosted_button_id" value="6RNT8A4HBBJRE">
                     <input type="hidden" name="business" value="usamakayani532@gmail.com">
                     <input type="hidden" name="item_name" value="{{Session::get('order_id')}}">
                     <input type="hidden" name="item_number" value="{{Session::get('order_id')}}">
                     <input type="hidden" name="amount" value="{{Session::get('total_amount')}}">
                     <input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_paynow_107x26.png" alt="Buy Now">
                     <img alt="" src="https://paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                   </form>
                 
				  
                  
</div>
        </div>
        </div>
@endsection

<?php 
Session::forget('order_id');
Session::forget('total_amount');

?>
