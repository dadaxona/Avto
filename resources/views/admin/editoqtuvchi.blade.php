
@extends('admin.dashbordadmin')
@section('title','Oqtuvchini Yangilash')
 
@section('controlad')
<div class="container-fluid">
    <div class="row">            
                <h1>Oquchilarni malumotlarini yangilash</h1>
                <hr>                
                <h2 style="text-align: center">{{ $date->firstname }}ning malumotlari </h2>
                <form action="{{ route('updatadmin',$date->id) }}" method="POST">
                @csrf                    
                <input type="hidden" name="id" value="{{ $date->id }}">                
                <div class="row">
                <div class="col-6">
                        <div class="form-group">
                            <label for="exampleFormControlInput1" class="form-label">Isim Familiya</label>
                            <input type="text" class="form-control" name="firstname"  value="{{$date->firstname}}">
                            <span class="text-danger">@error('firstname') {{$message}}@enderror</span>
                        </div>
                    </div>
                 
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">Telefon</label>
                                <input type="number" class="form-control" placeholder="+998..." name="phone"  value="{{$date->phone}}">
                                <span class="text-danger">@error('phone') {{$message}}@enderror</span>
                            </div> 
                        </div>  
                        <div class="col-6">                      
                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">Tugilgan Sana</label>
                                <input type="date" class="form-control" placeholder="Tugilgan Sana" name="birthdata"  value="{{$date->birthdata}}">
                                <span class="text-danger">@error('birthdata') {{$message}}@enderror</span>
                            </div> 
                        </div>  
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">Passport Seriya</label>
                                <input type="text" class="form-control" placeholder="AA0123456" name="seriya"  value="{{$date->seriya}}">
                                <span class="text-danger">@error('seriya') {{$message}}@enderror</span>
                            </div>      
                        </div>  
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">Yashash Joyi</label>
                                <input type="text" class="form-control" placeholder="Yashash Joyi" name="adress"  value="{{$date->adress}}">
                                <span class="text-danger">@error('adress') {{$message}}@enderror</span>
                            </div>
                    </div>
                    <br>
                    <div class="form-group pt-2">
                        <button type="submit" class="btn btn-success">Yangilash</button>
                    </div>
                </form>            
        </div>
    </div>
@endsection