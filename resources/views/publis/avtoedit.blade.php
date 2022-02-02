@extends('publis.dashbord')
@section('title','Avtomobillarni Yangilash')
@section('control')
    <div class="container-fluid">
        <div class="row">
     
                <h1>Automobil malumotlarini yangilash</h1>               
                <hr>               
                <form action="{{ route('new.storeccupdate',$date->id) }}" method="POST">
                    @csrf                    
                   <div class="row">                   
                        <input type="hidden" name="id" value="{{ $date->id }}">               
                    <div class="form-group col-6">
                        <label for="exampleFormControlInput1" class="form-label">Avtomobil rusum</label>
                        <input type="text" class="form-control" placeholder="Avtomobil rusum" name="mashina"  value="{{$date->mashina}}">
                        <span class="text-danger">@error('mashina') {{$message}}@enderror</span>
                    </div>
                    <div class="form-group col-6">
                        <label for="exampleFormControlInput1" class="form-label">Davlat raqami</label>
                        <input type="text" class="form-control" placeholder="Davlat raqami" name="nomer"  value="{{$date->nomer}}">
                        <span class="text-danger">@error('nomer') {{$message}}@enderror</span>
                    </div>  
                    <div class="form-group col-6">
                        <label for="exampleFormControlInput1" class="form-label">Ishlab chiqarilgan sana</label>
                        <input type="date" class="form-control" placeholder="Ishlab chiqarilgan sana" name="yil"  value="{{$date->yil}}">
                        <span class="text-danger">@error('yil') {{$message}}@enderror</span>
                    </div>                       
                    <br>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
                    <button type="submit" class="btn btn-success">Yangilash</button>
                    </div>
                </form>
          
        </div>
    </div>
@endsection