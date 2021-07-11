@extends('vendor.vendor_layouts.main_layout')

@section('content')


<div class="card" style="margin-left:350px; background-color:white; padding:30px; margin-right:150px; margin-top:30px;">
<div class="card-header">
<h4>View Orders</h4>
</div>

<div class="card-body" >
    <hr>
    <a href="/vendor/view-orders" style="margin-left:740px;"><button class="btn btn-info">Back</button></a>
    
  <div class="grid-container" style="margin-top:20px; background-color:#2B333E; color:white;">
  <div class="grid-item" style="border-right:2px solid white;">
  <h4 style="text-align:center;">Customer Information</h4>
  <hr>
        <span><strong>Customer Name:</strong> {{$orderDetails->customer_name}}</span><br><br>
        <span><strong>Customer Email:</strong> {{$orderDetails->customer_email}}</span><br><br>
        <span><strong>Customer Phone:</strong> {{$orderDetails->customer_phone}}</span><br><br>
        <span><strong>Payment Method: </strong> {{$orderDetails->payment_method}}</span><br><br>
        <span><strong>Total Amount:</strong> {{$orderDetails->total_amount}}</span><br><br>
        <span><strong>Customer Province/City:</strong> {{$orderDetails->customer_address1}}</span><br><br>
        <span><strong>Customer Complete Address:</strong> {{$orderDetails->customer_address2}}</span><br><br>
        <span><strong>Ordered Date:</strong> {{$orderDetails->created_at}}</span><br><br>
        
       
  </div>
  <div class="grid-item">
  <h4 style="text-align:center;">Products Information</h4>
  <hr>
  @foreach($orderDetails->orders as $order)
        <span><strong>Product Name:</strong> {{$order->product_name}}</span><br><br>
        <span><strong>Product:</strong> {{$order->product_code}}</span><br><br>
        <span><strong>Product Price:</strong> {{$order->product_price}}</span><br><br>
        <span><strong>Product Quantity:</strong> {{$order->product_qty}}</span><br><br>
        <hr>
 @endforeach

  </div>
  </div>
        
</div>

</div>
</div>

@endsection
<style>
.fonts {
    font-size:16px;
    
}
.grid-container {
    background-color:#2B333E;
  display: grid;
  grid-template-columns: auto auto;
  padding: 10px;
}

.grid-item {
  background-color:#2B333E; 
  color:white;"
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 10px;
  font-size: 16px;
}


</style>