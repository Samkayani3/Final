@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card box" style="background-color:black; color:white;">
                <div class="card-header" style="font-size:20px;">{{ __('Register') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            

                            <div class="col-md-12">
                                <input id="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                           

                            <div class="col-md-12">
                                <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            

                            <div class="col-md-12">
                            <select class="" id="inputGroupSelect01" name="role" 
                            style="background-color:black; 
                                background: none;
                                display: block;
                                margin: 10px auto;
                                text-align: center;
                                border: 2px solid #3498db;
                                width: 250px;
                                height:40px;
                                padding-left:10px;
                                outline: none;
                                color: white;
                                border-radius: 24px;
                                transition: 0.25s;">
                                <option selected disabled style="background-color:black;">Role<img src="https://www.pinpng.com/pngs/m/51-519289_down-arrow-png-image-background-black-arrow-down.png" style="width:40px; height:40px;"></img> </option>
                                <option value="vendor"  style="background-color:black;">Vendor</option>
                                <option value="customer" style="background-color:black;">Customer</option>
    
                            </select>

                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-md-12">
                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                           
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" placeholder=" Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<style>


.card {
    margin-bottom: 20px;
    border: none;
    background-color:black;
}
.box {
    width: 500px;
    padding: 20px;
    position: absolute;
    background-color:black;
    text-align: center;
    transition: 0.25s;
    margin-top: 10px;
}



.box input[type="text"],
.box input[type="email"],
.box input[type="password"]
{
    border: 0;
    background-color:black;
    background: none;
    display: block;
    margin: 10px auto;
    text-align: center;
    border: 2px solid #3498db;
    width: 250px;
    outline: none;
    color: white;
    border-radius: 24px;
    transition: 0.25s;
}
.input:hover {
background-color:red;
}

</style>
