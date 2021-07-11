@extends('vendor.vendor_layouts.main_layout')

@section('content')

<div class="container-fluid" style="margin-left:360px; background-color:white; padding:30px; margin-right:25px;  margin-top:40px;">
    <div class="row">
     <div class="col-sm-4">
     <div class="card" style="color:white; background-color:black; width:200px; height:200px; border-radius:5px;">
<h3 style="text-align:center; padding-top:80px;"><a href="/vendor/view-products" style="color:white; text-decoration:none;" class="hover">Total Products ({{$products}})</a></h3>
</div>
</div> 

<div class="col-sm-4">
     <div class="card" style="color:white; background-color:red; width:200px; height:200px; border-radius:5px;">
<h3 style="text-align:center; padding-top:80px;">Total Orders (4)</h3>
</div>
</div>





</div>
</div>

@endsection

<style>
.hover:hover {
     font-size:25px;
     
}
</style>