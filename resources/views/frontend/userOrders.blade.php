@extends('frontend.layout')
@section('title', 'My Orders')
@section('content')

<div class="container" style="margin-top:50px;">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Orders</li>
				</ol>
			</div>
            
            <div class="table-responsive cart_info">
				<table class="table table-condensed" >
					<thead style=" background-color:orange; color:white;" >
						<tr class="cart_menu" >
							<td><h5>Order ID</h5></td>
							<td><h5>Ordered Product</h5></td>
                            
							<td><h5>Payment Method</h5></td>
							<td><h5>Total Amount</h5></td>
                            <td><h5>Time</h5></td>
                            <td><h5>Date</h5></td>
							
						</tr>
					</thead>
					<tbody >
                    @foreach($orders as $order)
                    <tr class="cart_menu">
							<td >{{$order->id}}</td>
							<td>
                            @foreach($order->orders as $pro)
                            <a href="{{url('/orders/'.$order->id)}}">{{$pro->product_name}}<br></a>
                            @endforeach
                            </td>
                            
							<td >{{$order->payment_method}}</td>
							<td >Rs:{{$order->total_amount}}</td>
                            
                            <td >{{$order->created_at->format('h:i:s A') }} </td>
                            <td >{{$order->created_at->format('m-d-Y') }}</td>
							
							
						</tr>
                        @endforeach
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