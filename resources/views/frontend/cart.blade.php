@extends('frontend.layout')
@section('title', 'Cart')
@section('content')


<section id="cart_items">
		<div class="container" style="margin-top:50px;">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="/home">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			
			@if (session('msg'))
<div class="alert alert-success alert-block" style="width:100%; ">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ session('msg') }}</strong>
</div>
@endif
			<div class="table-responsive cart_info" >
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
						    <td >Product Image</td>
							<td style="margin-left:-30px;">Item Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td>Delete Item</td>
						</tr>
					</thead>
					<tbody >
					<?php $total_amount = 0; ?>
                        @foreach($cart as $cartprod)
						<tr >
						<td><img src="{{'/uploads/product/'.$cartprod->image}}" alt="image" style="width:80px; height:70px;"></img></td>
							<td style="margin-left:-30px;">
								<h4>{{$cartprod->product_name}}</h4>
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
						
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
    
	<section id="do_action">
		<div class="container">
			<div class="row">
			
				<div class="col-sm-8" style="margin-left:33%;">
					<div class="total_area">
						<ul>
							
							<li>Total <span>Rs: <?php echo $total_amount; ?></span></li>
						</ul>
						@if($total_amount>0)
							<a class="btn btn-primary update" href="/cart">Update</a>
							<a class="btn btn-success check_out" href="/checkout">Check Out</a>
					@endif
					</div>
				</div>
			</div>
		</div>
	</section>
	

@endsection