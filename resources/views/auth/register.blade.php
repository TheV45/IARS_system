<style>
        html,body{
            background-image: url("http://ves.ac.in/vesit/wp-content/uploads/sites/3/2015/11/IMG_93121-optimized.jpg");
            background-repeat: no-repeat;
            background-size: cover; 
            height: 100%;
            font-family: 'Numans', sans-serif;
            }
            
            .container{
            height: 100%;
            align-content: center;
            }
            
            .card{
            height: 580px;
            margin-top: 50px;
            margin-bottom: auto;
            width: 470px;
            background-color:rgba(0,0,0,0.7) !important;
            }
            
            /* .social_icon span{
            font-size: 60px;
            margin-left: 10px;
            color: #FFC312;
            } */
            
            /* .social_icon span:hover{
            color: white;
            cursor: pointer;
            } */
            
            .card-header h4,p{
            margin-top: 80px;
            color: white;
            }
            
            /* .social_icon{
            position: absolute;
            right: 150px;
            top: 20px;
            } */
            
            .input-group-prepend span{
            width: 50px;
            background-color: #FFC312;
            color: black;
            border:0 !important;
            }
            
            input:focus{
            outline: 0 0 0 0  !important;
            box-shadow: 0 0 0 0 !important;
            
            }
            
            .remember{
            color: white;
            }
            
            .remember input
            {
            width: 20px;
            height: 20px;
            margin-left: 15px;
            margin-right: 5px;
            }
            
            .register_btn{
            color: black;
            background-color: #FFC312;
            width: 150px;
            }
            
            .register_btn:hover{
            color: black;
            background-color: white;
            }
            
            .links{
            color: white;
            }
            
            .links a{
            margin-left: 4px;
            }
        </style>
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <h4 class="card-title mt-3 text-center" style="color: white">Create Account</h4>
            <p class="text-center">Get started with your free account</p>          
        <div class="card-body">
        <form method="POST" action = "{{ route('register') }}" >
            @csrf
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
             </div>
            <input id="name" name="name" class="form-control" placeholder="Full name" type="text" required> 
        
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div> <!-- form-group// -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
             </div>
            <input id="email" name="email" class="form-control" placeholder="Email address" type="email" required>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div> <!-- form-group// -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
            </div>
           
            <input type="text" value="     +91" style="max-width: 70px;" disabled>
            <input id="phone_no" name="phone_no" class="form-control" placeholder="Phone number" type="text" required>
        </div> <!-- form-group// -->
        
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            </div>
            <input id="password" class="form-control" placeholder="Create password" type="password" name="password" required>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div> <!-- form-group// -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            </div>
            <input id="password-confirm" class="form-control" placeholder="Repeat password" name="password_confirmation" type="password" required>
        </div> <!-- form-group// --> 
        <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fas fa-pen"></i> </span>
                </div>
        <input id="roll_no" type="number" class="form-control" placeholder="Roll no" name="roll_no" min=0 max=100 required>
        </div>
        <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-chalkboard"></i></span>
                    <select name="division" class="custom-select">
                            <option value="" >Select Class</option>
                            <option value="1">D1A</option>
                            <option value="2">D1B</option>
                            <option value="3">D2A</option>
                            <option value="4">D2B</option>
                            <option value="5">D2C</option>
                            <option value="6">D3</option>
                            <option value="7">D4A</option>
                            <option value="8">D4B</option>
                            <option value="9">D5</option>
                            <option value="10">D6A</option>
                            <option value="11">D6B</option>
                            <option value="12">D7A</option>
                            <option value="13">D7B</option>
                            <option value="14">D7C</option>
                            <option value="15">D8</option>
                            <option value="16">D9A</option>
                            <option value="17">D9B</option>
                            <option value="18">D10</option>
                            <option value="19">D11A</option>
                            <option value="20">D11B</option>
                            <option value="21">D12A</option>
                            <option value="22">D12B</option>
                            <option value="23">D12C</option>
                            <option value="24">D13</option>
                            <option value="25">D14A</option>
                            <option value="26">D14B</option>
                            <option value="27">D15</option>
                            <option value="28">D16A</option>
                            <option value="29">D16B</option>
                            <option value="30">D17A</option>
                            <option value="31">D17B</option>
                            <option value="32">D17C</option>
                            <option value="33">D18</option>
                            <option value="34">D19A</option>
                            <option value="35">D19B</option>
                            <option value="36">D20</option>
                        </select>
                        
                </div>
            </div> <!-- form-group end.// -->                                     
        <div class="form-group">
            <button type="submit" class="btn register_btn"> Create Account  </button>
        </div> <!-- form-group// -->      
        <p class="text-center">Have an account? <a href="/login">Log In</a> </p>                                                                 
    </form>
        </div>
            </div>
        </div>
    </div> 
@endsection
@if ($errors->any())    
    <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
@endif