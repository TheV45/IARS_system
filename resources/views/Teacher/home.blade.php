@extends('layouts.app1')
<style>
  .card{
            color:white;
            height: 300px;
            margin-top: 50px;
            margin-left: 70px;
            margin-bottom: auto;
            width: 600px;
            background-color:rgba(0,0,0,0.7) !important;
            }
            .sub_btn{
            color: black;
            background-color: #FFC312;
            width: 90px;
            margin-top: 10px;
            }
            
            .sub_btn:hover{
            color: black;
            background-color: white;
            }
          
</style>

<script type="text/javascript">
    function populate(){
        for (i=0;i<sub.length;  i++) {
                sub.options.remove(i);
        }
        document.getElementById('sub').disabled = false;
        var users = {!! json_encode($detail) !!};
        for(i = 0; i<users.length; i++){
            if(div.value == users[i]['division_id']){
                var newOption = document.createElement("option");
                newOption.value = users[i]['subject_id'];
                newOption.innerHTML = users[i]['subject_name'];
                sub.options.add(newOption);
            }
        }
    }
</script>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-top: 40px">
                <div class="card-body">
                        <div class="row ">
                                <div class="col-md-12 text-md-left">
                                    <h4 >Enter/Check Marks</h4>
                                   <hr style="border:1px solid #FFC312"> 
                                </div>
                            </div>
                    <form method="POST" action = "{{action('TeachersController@create')}}" >
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Test No:</label>
                            <div class="col-md-4">
                                <select name="test_no">
                                   <option value="1">Test 1</option>
                                   <option value="2">Test 2</option>
                                </select>
                            </div>
                    </div>
                <div class="form-group row">    
                    <label class="col-md-4 col-form-label text-md-right">Select Class:</label>
                        <div class="col-md-4">  
                            <select id="div" name="division_id" onchange = "populate()">
                                <option value="">Select Class:</option>
                               @for ($i = 0; $i < count($detail); $i++)
                                  <option value="{{$detail[$i]->division_id}}">{{$detail[$i]->div_name}}</option>
                                @endfor
                            </select>
                        </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Select Subject:</label>
                      <div class="col-md-4">
                         <select id = "sub" name="subject_no">
                            {{-- @for ($i = 0; $i < count($detail); $i++)
                                <option value="{{$detail[$i]->subject_id}}">{{$detail[$i]->subject_name}}</option>
                            @endfor --}}
                         </select>
                      </div>
                </div> 
                <div class="form-group row mb-0">
                    <div class="col-md-4 offset-md-4">
                            <button type ="submit" class ="btn sub_btn" >Submit<i class="fas fa-paper-plane"></i></button>
                    </div>
                </div>
                    </form>
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