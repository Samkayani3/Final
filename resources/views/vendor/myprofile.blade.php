@extends('vendor.vendor_layouts.main_layout')

@section('content')
@if (session('msg'))
<div class="container">
<div class="alert alert-success alert-block" style="width:75%; margin-left:23%; margin-top:100px; margin-bottom:-50px; ">
	<button type="button" class="close" data-dismiss="alert" style="margin-right:20px;"> x </button>	
        <strong>{{ session('msg') }}</strong>
</div>
</div>
@endif
<div class="card" style="margin-top:45px; margin-left:360px; background-color:#2B333E; padding:30px; margin-right:125px; ">
<!-- <div class="card-header">
<h3>My Profile</h3>
</div> -->

<div class="card-body" style="background-color:#2B333E; ">
   
  
  <div class="grid-container" >
  <div class="grid-item " >
  <h4 style="text-align:center; color:white;">Update Information</h4>
  <hr>
  <form action="{{'/update-vendor-profile/'.$account->id}}" method="POST">
                                @csrf
                                <div class="form-group ">
                                <input type="text" name="name" placeholder="Name *" required value="{{$account->name}}" style="height:40px; width:300px;">
</div>	
<div class="form-group ">
                                <input type="email" name="email"  placeholder="Email*" required value="{{$account->email}}" style="height:40px; width:300px;">
</div>	
                                <!--<input type="hidden" name="password"  placeholder="Password *" > -->
								<div class="form-group ">	
                                <input type="text" name="role"  placeholder="Role *" readonly value="{{Auth::user()->role}}" style="height:40px; width:300px;">
</div>
<div class="form-group ">   
                                <input type="text" name="phone_no"  placeholder="Mobile No *" required value="{{Auth::user()->phone_no}}" style="height:40px; width:300px;">
</div>
<div class="form-group ">
                                <select name="address1" style=" height:40px; background-color:#F0F0E9; width:300px;" >
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
</div>
                                    <div class="form-group ">
                                    <input type="text" name="address2"  placeholder="Address 2" value="{{$account->address2}}" required style="height:40px; width:300px;"><br>
</div>
<div class="form-group ">
                                    <button type="submit" class="btn btn-info">Update Profile</button>
</div>
                                </form>
  </div>
  <div class="grid-item" style="border-left:2px solid black;" >
  
  <h4 style="text-align:center; color:white;" >My Current Information</h4>
  <hr>
  <div style="color:white;">
        <strong>Name: </strong>{{$account->name}}</br><br>
		<strong>Email:</strong>{{$account->email}}<br><br>
		<strong>Role:</strong>{{$account->role}}</br><br>
		<strong>Phone No:</strong>{{$account->phone_no}}</br><br>
		<strong>Province/City:</strong>{{$account->address1}}</br><br>
		<strong>Address:</strong>{{$account->address2}}</br><br>
</div>	
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
  display: grid;
  grid-template-columns: auto auto;
  padding: 10px;
}

.grid-item {
    style="background-color:DarkSlateGrey; 
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 10px;
  font-size: 16px;
}
.grid-item > input{
    height:50px;
    background-color:yellow;
    color:black;
}
.update > input{
    font-size:50px;
    height:50px;

}


</style>
