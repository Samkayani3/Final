<?php 
use App\Http\Controllers\Controller;
use App\Product;
$mainCategories = Controller::mainCategories();
$cartCount = Product::cartCount();

?>


@extends('frontend.layout')
@section('title', 'Checkout')
@section('content')

<section id="cart_items">
		<div class="container" style="margin-top:50px;">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out
				  </li>
				</ol>
			</div><!--/breadcrums-->

  @if($cartCount < 1 )
  <h5 class="alert alert-danger">Please add atleast one product in Cart for Checkout </h5>
			
  @endif
			<!--/checkout-options-->

			<!--/register-req-->

			<div class="shopper-informations" >
				
					<div class="row" >
					<div class="col-sm-6 clearfix" style="width:65%; margin-left:5%; ">
						<div class="bill-to" >
							<p>Shipping Details</p>
							<div class="form-one">
								<form action="/order" method="POST">
								@csrf
								    <input type="text"  name="name" placeholder="Name *" required value="{{Auth::user()->name}}">
									<input type="email" name="email" placeholder="Email*" required value="{{Auth::user()->email}}">
									<input type="text"  name="phone_no" placeholder="Phone *" value="{{Auth::user()->phone_no}}" required>
									
									<select name="address1" style="width:300px; height:40px; background-color:#F0F0E9; width:348px;" >
										<option >{{Auth::user()->address1}}</option>
										<option value="Islamabad">Islamabad </option>
										<option value="Lahore ,Punjab">Lahore ,Punjab</option>
										<option value="Karachi">Karachi</option>
										<option value="Multan ,Punjab">Multan ,Punjab</option>
										<option value="Faislabad , Punjab">Faislabad , Punjab</option>
										<option value="Sindh">Sindh</option>
										<option value="Rawalpindi, Punjab">Rawalpindi, Punjab</option>
										<option value="Gujrat , Punjab">Gujrat , Punjab</option>
                                        <option value="Gujranwala ,Punjab">Gujranwala ,Punjab</option>
                                        <option value="Sukkur, Sindh">Sukkur, Sindh</option>
                                        <option value="Balochistan">Balochistan</option>
                                        <option value="Hyderabad, Sindh">Hyderabad, Sindh</option>
									</select>
									<textarea type="text" name="address2" required placeholder="Complete Address" value="{{Auth::user()->address2}}" style="width:348px; height:100px; background-color:#F0F0E9;"></textarea>
							</div>
							
						</div>
					</div>
										
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed" style="width:100%;">
					<thead>
						<tr class="cart_menu" >
						<td>Product Image</td>
							<td class="image">Item Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td>Delete Item</td>
							
						</tr>
					</thead>
					<tbody>
                    <?php $total_amount = 0; ?>
                    @foreach($cart as $cartprod)
						<tr>
						<td><img src="{{'/uploads/product/'.$cartprod->image}}" alt="image" style="width:80px; height:60px;"></img></td>
							<td class="cart_description">
                            <h4 >{{$cartprod->product_name}}</h4>
								<p>{{$cartprod->product_code}}</p>
							</td>
							<td class="cart_price">
                            <p>RS: {{$cartprod->price}}</p>
							
							</td>
							<td class="cart_quantity">
                            <div class="cart_quantity_button">
									<a class="cart_quantity_up" href="{{url('/cart/update-quantity/'.$cartprod->id.'/1')}}"> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="{{$cartprod->quantity}}" autocomplete="off" size="2" style="width:50px; height:27px;">
									@if($cartprod->quantity>1)
									<a class="cart_quantity_down" href="{{url('/cart/update-quantity/'.$cartprod->id.'/-1')}}"> - </a>
								    @endif
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">Rs: {{$cartprod->price*$cartprod->quantity}}</p>
							</td>
							<td class="cart_delete" style="margin-top:20px; margin-left:30px;">
								<a class="cart_quantity_delete" href="{{url('/cart/product/'.$cartprod->id)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
                        <?php $total_amount = $total_amount + ($cartprod->price*$cartprod->quantity); ?>
                    @endforeach
					<?php $s_amount = 0; ?>
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td>Rs: <?php echo $total_amount; ?></td>
									</tr>
									@if($total_amount <= 500)
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td><?php $s_amount = 0; ?>Free Shipping</td>											
									</tr>
									@elseif($total_amount > 500 && $total_amount <= 1000 )
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Rs: <?php $s_amount = 100; ?>100</td>										
									</tr>
									@elseif($total_amount > 1000 && $total_amount <= 1500)
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Rs: <?php $s_amount = 150; ?>150</td>										
									</tr>
									@elseif($total_amount > 1500 && $total_amount <= 2000)
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Rs: <?php $s_amount = 200; ?>200</td>										
									</tr>
									@elseif($total_amount > 2000 && $total_amount <= 2500)
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Rs: <?php $s_amount = 250; ?>250</td>										
									</tr>
									@elseif($total_amount >= 2500 && $total_amount <= 3000)
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Rs: <?php $s_amount = 300; ?>300</td>										
									</tr>
									@elseif($total_amount > 3000 && $total_amount <= 3500)
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Rs: <?php $s_amount = 350; ?>350</td>										
									</tr>
									@elseif($total_amount > 3500 && $total_amount <= 4000)
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Rs: <?php $s_amount = 400; ?>400</td>										
									</tr>
									@elseif($total_amount > 4000 && $total_amount <= 4500)
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Rs: <?php $s_amount = 450; ?>450</td>										
									</tr>
									@elseif($total_amount > 4500 && $total_amount <= 5000)
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Rs: <?php $s_amount = 500; ?>500</td>										
									</tr>
									@else
			
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Rs: <?php $s_amount = 500; ?>500</td>										
									</tr>
								
									@endif
									<tr>
										<td>Total</td>
										<td><span><input type="hidden" name="total_amount" value="{{$total_amount}}">Rs: {{$total_amount+$s_amount}}</span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				
				</table>
				
			</div>
			</div>
			
			<div class="payment-options" style="margin-top:10px;">
			        <span>
					<label><strong>Choose Payment Method: </strong></label>
					</span>
					<span>
						<label><strong><input type="radio" value="COD" name="payment_method" required> Cash On Delivery</strong></label>
					</span>
					<span>
						<label><strong><input type="radio" value="Paypal" name="payment_method" required> Paypal</strong></label>
					</span>
					
					@if($total_amount>0)
					<span>
					<button type="submit" class="btn btn-info" style="float:right;">Place Order</button>
					</span>
					@else
					<br><br>
					<h5 class="alert alert-danger">No Product has added to Cart </h5>
					@endif
					
					
				</div>
				
				</form>
				</div>
			
		</div>
	</section>
@endsection

