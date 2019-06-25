@extends('layouts.app1')
<style>
          .card{
            /* height: 500px; */
            /* margin-top: 50px; */
            color: white;
            margin-bottom: auto;
            /* width: 400px; */
            background-color:rgba(0,0,0,0.7) !important;
            }
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
            .update_btn{
            color: black;
            background-color: #FFC312;
            width: 130px;
            margin-top: 30px;
            }
            
            .update_btn:hover{
            color: black;
            background-color: white;
            }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-top:20px">

                <div class="card-body">
                        <div class="row ">
                                <div class="col-md-12 text-md-left">
                                    <h4 >Profile</h4>
                                   <hr style="border:1px solid #FFC312"> 
                                </div>
                            </div>
                   
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                            <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fas fa-user"></i></span>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $profile->name }}" required autocomplete="name" autofocus disabled>
                            </div>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                    <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input id="email" type="email" disabled class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $profile->email }}" required autocomplete="email">
                                    </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

       


                        <div class="form-group row">
                            <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                    <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                <input id="phone_no" disabled type="text" class="form-control" name="phone_no" value="{{$profile->phone_no}}" required>
                            </div>
                            </div>
                        </div>
                      @if($profile_count != 0)
                        {{-- <div class="form-group row">
                            <label for="phone_no" class="col-md-4 col-form-label text-md-right">Select No. of Classes</label>
                            <div class="col-md-6">   
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                    <input type="radio" name="gender" style="margin-right:5px;" value="" onchange = "enable1()"><font color="white">One</font> <br>
                                    <input type="radio" name="gender" style="margin-right:5px;margin-left:15px" value="" onchange = "enable2()"><font color="white">Two</font>
                            </div>
                    </div>
                    <div class="form-group input-group" id = 'class1' style = "display:none;">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-chalkboard"></i></span>
                         <select id="class_1" type="text" class="form-control"  name="class_1">
                            <option value= "" >Class1</option>
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
                          <p>&nbsp;</p>
                          <span class="input-group-text"><i class="fas fa-book-open"></i></span>
                          <select id="sub_1" type="text" class="form-control" name="sub_1" required disabled>
                                <option value = 1 >CMPN: AM4</option>
                                <option value = 2 >CMPN: OS</option>
                                <option value = 3 >CMPN: COA</option>
                                <option value = 4 >CMPN: AOA</option>
                                <option value = 5 >CMPN: ECCF</option>
                                <option value = 6 >CMPN: CG</option>
                                <option value = 7 >CMPN: DS</option>
                                <option value = 8 >CMPN: AM3</option>
                                <option value = 9 >CMPN: DLDA</option>
                                <option value = 10 >CMPN: DM</option>
                                <option value = 11 >CMPN: PHYSICS </option>
                                <option value = 12 >CMPN: CHEMISTRY</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-group input-group" id = "class2" style = "display:none;">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-chalkboard"></i></span> 
                            <select id="class_2" type="text" class="form-control" name="class_2" disabled>
                                    <option value= "" >Class2</option>
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
                            <p>&nbsp;</p>
                            <span class="input-group-text"><i class="fas fa-book-open"></i></span>
                            <select id="sub_2" type="text" class="form-control" name="sub_2" required disabled>
                                    <option value = 1 >CMPN: AM4</option>
                                    <option value = 2 >CMPN: OS</option>
                                    <option value = 3 >CMPN: COA</option>
                                    <option value = 4 >CMPN: AOA</option>
                                    <option value = 5 >CMPN: ECCF</option>
                                    <option value = 6 >CMPN: CG</option>
                                    <option value = 7 >CMPN: DS</option>
                                    <option value = 8 >CMPN: AM3</option>
                                    <option value = 9 >CMPN: DLDA</option>
                                    <option value = 10 >CMPN: DM</option>
                                    <option value = 11 >CMPN: PHYSICS </option>
                                    <option value = 12 >CMPN: CHEMISTRY</option>
                            </select>
                        </div>
                    </div> 
                            </div>                                

                        </div>
                        @else --}} 
                            @foreach($classes as $c)
                            {{$c->subject_name}}
                           {{$c->div_name}}
                            @endforeach
                        @endif
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                   <a href="/teacher/updateprofile"> <button type="submit" class="btn float-left update_btn">
                                            <i class="fas fa-edit"></i>Update Profile
                                        </button></a>
                            </div>
                        </div>
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