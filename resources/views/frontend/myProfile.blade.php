@extends('frontend.layout')
@section('title', 'My Account')
@section('content')

<section id="cart_items">
		<div class="container" style="margin-top:50px;">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="/home">Home</a></li>
				  <li class="active">Account</li>
				</ol>
			</div>
            @if (session('msg'))
<div class="alert alert-success alert-block" style="width:100%; ">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ session('msg') }}</strong>
</div>
@endif
        <div class="row">
        <div class="col-sm-6">
        <p>My Account</p>
							<div class="form-one">
								<form action="/update-profile/{{$account->id}}" method="POST">
                                @csrf
                                <input type="text" name="name" placeholder="Name *" required value="{{$account->name}}">
									<input type="email" name="email"  placeholder="Email*" required value="{{$account->email}}">
									<!--<input type="hidden" name="password"  placeholder="Password *" > -->
									<input type="text" name="role"  placeholder="Role *" value="{{Auth::user()->role}}" readonly>
                                    <input type="text" name="phone_no"  placeholder="Mobile No *" required value="{{Auth::user()->phone_no}}" >
									<select name="address1" style="width:263px; height:40px; background-color:#F0F0E9; " >
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
									<input type="text" name="address2"  placeholder="Address 2" value="{{$account->address2}}" required>
                                    <button type="submit" class="btn btn-info">Update Profile</button>
                                </form>
							</div>
        </div>
        <div class="col-sm-6" style="border:1px solid Gainsboro; padding:20px; margin-top:20px; background-color:#F0F0E9;">
        <h4>My Current Information</h4>
		<hr>
		<div class="row" style="margin-left:20px; ">
		<div class="col-sm-3">
		<h4>Name: </h4>
		<h4>Email:</h4>
		<h4>Role:</h4>
		<h4>Phone No:</h4>
		<h4>Province/City:</h4>
		<h4>Address:</h4>
		
		</div>
		<div class="col-sm-8" style="margin-top:12px;">
		<p>{{$account->name}}</p>
		<p>{{$account->email}}</p>
		<p>{{$account->role}}</p>
		<p>{{$account->phone_no}}</p>
		<p>{{$account->address1}}</p>
		<p>{{$account->address2}}</p>
		</div>
		</div>
        </div>
        </div>
        </div>
</div>
@endsection

