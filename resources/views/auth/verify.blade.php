@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card box" style="background-color:black; color:white;">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
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
