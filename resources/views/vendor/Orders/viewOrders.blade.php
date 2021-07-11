@extends('vendor.vendor_layouts.main_layout')

@section('content')


@if (session('msg'))
<div class="alert alert-success alert-block" style="width:50%; margin-left:400px;">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ session('msg') }}</strong>
</div>
@endif

<div class="card" style="margin-left:350px; background-color:white; padding:30px; margin-right:150px; margin-top:30px;">
<div class="card-header">
<h4>View Orders</h4>
</div>

<div class="card-body">
<div class="container-fluid">
    <hr>
    
    <div class="row-fluid">
      <div class="span12">
<div class="widget-box">
         
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead style="background-color:black;color:white;">
                <tr>
                  <th><h6>Order ID</h6></th>
                  <th><h6>Customer Name</h6></th>
                  <th><h6>Ordered Products</h6></th>
                  <th><h6>Ordered Amount</h6></th>
                  <th><h6>Ordered Date</h6></th>
                  <th><h6>Ordere Status</h6></th>
                  <th><h6>Action</h6></th>
                </tr>
              </thead>
              <tbody style="background-color:DarkSlateGrey; color:white;">
                  @foreach($orders  as $order)
                <tr >
                  <td>{{$order->id}}</td>
                  <td>{{$order->customer_name}}</td>
                  <td>
                  @foreach($order->orders as $ord)
                  {{$ord->product_name}}({{$ord->product_qty}})<br>
                  @endforeach
                  </td>
                  <td>{{$order->total_amount}}</td>
                
                  <td>{{$order->created_at->format('m-d-Y')}}</td>
                  <td><button type="button" id="AddButton" onclick="AddButtonClick()" class="btn btn-info ">Pending</button> </td>
                  <td><a href="{{url('vendor/Order-Details/'.$order->id)}}"><button class="btn btn-success">View Details</button></a></td>
                </tr> 
                @endforeach

              </tbody>
              
            </table>
        
          </div>
        </div>
        <div style="margin-left:600px;">
          
</div>
</div>
</div>
</div>
</div>
</div>
@endsection

<script type="text/javascript">
function confirm_delete() {
  return confirm('Do you really want to Delete it?');
}

</script>

<script>
function AddButtonClick(){ 
      //change text from add to Update
      $("#AddButton").text('Completed');
    }

</script>

