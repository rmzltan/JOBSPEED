@extends('layouts.master')
@section('title', 'Verify | JobSpeed')
@section('main-container')
<style>
    .image3{
        width: 400px;
        height:  400px;
    }
    .btn{
        background:#4F2982;
        color:white;
        outline:none;
        border:none;
    }
    .btn:hover{
        background:#9F68E8; 
    }
    .alert{
        margin-top:20px;
    }
</style>
<div class="container">
<br><br><br>
    <div class="box " style="text-align:center">
        <div class="box-details ">
            <h1>Verify Email</h1>
            <p>You will need to verify your email to complete registration</p>
            <img class="image3" src="{{ url('Images/email.png') }}">
            <p>Kindly click send and we will send you a link to verify your account. <br>
                If you have not received the email after a few minutes, please check your spam folder</p>
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn btn btn-outline-success">{{ __('Send Verification') }}</button>.
            </form>
            <br>
            
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif  
            </p>
             
        </div>
    </div>
    
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
@endsection
