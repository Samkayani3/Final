@extends('frontend.layout')
@section('title', 'Orders Details')
@section('content')

<div class="container" style="margin-top:50px;">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="/home">Home</a></li>
				  <li ><a href="/user-orders">Order</a></li>
                  <li>{{$orderDetails->id}}</li>
				</ol>
			</div>
            
            <div class="table-responsive cart_info" style="margin-bottom:100px;">
				<table class="table table-condensed" >
					<thead style=" background-color:orange; color:white;" >
						<tr class="cart_menu" >
							<td><h5>Product Name</h5></td>
							<td><h5>Product Code</h5></td>
                            <td><h5>Product Quantity</h5></td>
							<td><h5>Product Price</h5></td>
                            
						</tr>
					</thead>
					<tbody >
                    @foreach($orderDetails->orders as $order)
                    <tr class="cart_menu">
							<td >{{$order->product_name}}</td>
							<td >{{$order->product_code}}</td>
                            <td >{{$order->product_qty}}</td>
							<td >Rs:{{$order->product_price}}</td>
                            @endforeach
							
						</tr>
                    </tbody>
                    </table>
                    </div>

</div>

@endsection

<style>
.cart_menu > td{
    border:1px solid #DCDCDC;
}
</style>