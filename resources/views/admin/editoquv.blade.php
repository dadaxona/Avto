@extends('admin.dashbordadmin')
@section('title','Oquvchini Yangilash')
@section('controlad')
    <div class="container-fluid">
        <div class="row">
     
                <h1>O`quchilarni malumotlarini yangilash</h1>               
                <hr>
                <h2 style="text-align: center">{{ $date->firstname }}ning malumotlari </h2>
        
             <form action="{{ route('showadmin',$data->number) }}" method="GET">
                <input type="hidden" name="number" value="{{ $data->number }}">
                <input type="hidden" name="category" value="{{ $data->category }}">
                <input type="hidden" name="summa" value="{{ $data->summa  }}">
                <button type="submit" class="btn btn-info">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left" viewBox="0 0 16 16">
                        <path d="M10 12.796V3.204L4.519 8 10 12.796zm-.659.753-5.48-4.796a1 1 0 0 1 0-1.506l5.48-4.796A1 1 0 0 1 11 3.204v9.592a1 1 0 0 1-1.659.753z"></path>
                        </svg>
                        Guruhga qaytish
                </button>
            </form>           
                <form action="{{ route('updateadmirals',$date->id) }}" method="POST">
                    @csrf                    
                   <div class="row">                   
                            <input type="hidden" name="id" value="{{ $date->id }}">
                            <input type="hidden" name="group_id" value="{{ $date->group_id }}">                  
                        <div class="form-group col-6">
                            <label for="exampleFormControlInput1" class="form-label">Isim</label>
                            <input type="text" class="form-control" placeholder="Isim" name="firstname"  value="{{$date->firstname}}">
                            <span class="text-danger">@error('firstname') {{$message}}@enderror</span>
                        </div>
                        <div class="form-group col-6">
                            <label for="exampleFormControlInput1" class="form-label">Familiya</label>
                            <input type="text" class="form-control" placeholder="Familiya" name="lastname"  value="{{$date->lastname}}">
                            <span class="text-danger">@error('lastname') {{$message}}@enderror</span>
                        </div>  
                        <div class="form-group col-6">
                            <label for="exampleFormControlInput1" class="form-label">Otasining Ismi</label>
                            <input type="text" class="form-control" placeholder="Otasining Ismi" name="ochestvo"  value="{{$date->ochestvo}}">
                            <span class="text-danger">@error('ochestvo') {{$message}}@enderror</span>
                        </div>  
                        <div class="form-group col-6">
                            <label for="exampleFormControlInput1" class="form-label">Telefon</label>
                            <input type="number" class="form-control" placeholder="+998..." name="phone"  value="{{$date->phone}}">
                            <span class="text-danger">@error('phone') {{$message}}@enderror</span>
                        </div>   
                        <div class="form-group col-6">
                            <label for="exampleFormControlInput1" class="form-label">Tugilgan Sana</label>
                            <input type="date" class="form-control" placeholder="Tugilgan Sana" name="birthdata"  value="{{$date->birthdata}}">
                            <span class="text-danger">@error('birthdata') {{$message}}@enderror</span>
                        </div>   
                        <div class="col-6 form-group">
                            <label for="exampleInputEmail1" class="form-label">Malumoti</label>
                                <select name="malumoti" class="form-control" style="color: #6c757d;">
                                    <option value="" >Malumoti</option>
                                    <option value="O`rta">O`rta</option>
                                    <option value="Oliy">Oliy</option>
                                    <option value="Magistratura">Magistratura</option>
                                    <option value="Aspirantura">Aspirantura</option>
                                </select>
                            <span class="text-danger">@error('malumoti') {{$message}}@enderror</span>            
                        </div>
                        <div class="form-group col-6">
                            <label for="exampleFormControlInput1" class="form-label">Passport Seriya</label>
                            <input type="text" class="form-control" placeholder="AA0123456" name="seriya"  value="{{$date->seriya}}">
                            <span class="text-danger">@error('seriya') {{$message}}@enderror</span>
                        </div>   
                        <div class="form-group col-6">
                            <label for="exampleFormControlInput1" class="form-label">Tumani</label>
                            <input type="text" class="form-control" placeholder="Tuman" name="adress"  value="{{$date->adress}}">
                            <span class="text-danger">@error('adress') {{$message}}@enderror</span>
                        </div>
                        <div class="form-group col-6">
                            <label for="exampleFormControlInput1" class="form-label">Yashash Joyi</label>
                            <input type="text" class="form-control" placeholder="Yashash Joyi" name="adress2"  value="{{$date->adress2}}">
                            <span class="text-danger">@error('adress2') {{$message}}@enderror</span>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                    <button type="submit" class="btn btn-success">Yangilash</button>
                    </div>
                </form>
          
        </div>
    </div>
@endsection