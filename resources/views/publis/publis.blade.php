@extends('publis.dashbord')
@section('title','Oquchilarni Royhatga Olish')
@section('control')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">                
                <h2 style="text-align: center">{{ $date->number }}:{{ $date->category }} Guruhga o'quvchi qoshish</h2>
                <form action="{{ route('create') }}" method="POST">
           
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="group_id" value="{{ $date->number }}">
                        <input type="hidden" name="cagigory" value="{{ $date->category }}">
                        <input type="hidden" name="summa" value="{{ $date->summa }}">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">Ism</label>
                                <input type="text" class="form-control" placeholder="Isim" name="firstname"  value="{{old('firstname')}}">
                        <span class="text-danger">@error('firstname') {{$message}}@enderror</span>
                            </div>  
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">Familiya</label>
                                <input type="text" class="form-control" placeholder="Familiya" name="lastname"  value="{{old('lastname')}}">
                                <span class="text-danger">@error('lastname') {{$message}}@enderror</span>
                            </div>  
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">Otasining Ismi</label>
                                <input type="text" class="form-control" placeholder="Otasining Ismi" name="ochestvo"  value="{{old('ochestvo')}}">
                                <span class="text-danger">@error('ochestvo') {{$message}}@enderror</span>
                            </div>  
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">Telefon</label>
                                <input type="number" class="form-control" placeholder="+998..." name="phone"  value="{{old('phone')}}">
                                <span class="text-danger">@error('phone') {{$message}}@enderror</span>
                            </div>   
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">Tugilgan Sana</label>
                                <input type="date" class="form-control" placeholder="Tugilgan Sana" name="birthdata"  value="{{old('birthdata')}}">
                                <span class="text-danger">@error('birthdata') {{$message}}@enderror</span>
                            </div>   
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
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">Passport Seriya</label>
                                <input type="text" class="form-control" placeholder="AA0123456" name="seriya"  value="{{old('seriya')}}">
                                <span class="text-danger">@error('seriya') {{$message}}@enderror</span>
                            </div>   
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">Tumani</label>
                                <input type="text" class="form-control" placeholder="Tumani" name="adress"  value="{{old('adress')}}">
                                <span class="text-danger">@error('adress') {{$message}}@enderror</span>
                            </div>
                        </div>      
                        
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">Yashash Joyi</label>
                                <input type="text" class="form-control" placeholder="Yashash Joyi" name="adress2"  value="{{old('adress2')}}">
                                <span class="text-danger">@error('adress2') {{$message}}@enderror</span>
                            </div>
                        </div>  

                        <div class="col-4 pt-2">
                            <label for="exampleFormControlInput1" class="form-label">Tasdiqlash</label>
                            <br>
                            <input class="form-check-input" type="checkbox" name="jamis" value="0" id="flexCheckDefault" checked>
                            <span class="text-danger">@error('jamis') {{$message}}@enderror</span>                        
                        </div>
                    </div>
                    <br>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
                        <button type="submit" class="btn btn-success">Kiritish</button>
                    </div>
                </form>
                <hr>
                @if ($count < 10)
                    <h1> Jami o'quvchi: {{ $count }}</h1>
                @elseif($count > 10 && $count < 20)
                    <h1 style="color: #ffc400"> Jami o'quvchi: {{ $count }}</h1>
                @elseif($count >= 20)
                    <h1 style="color: #2ffb2f"> Jami o'quvchi: {{ $count }}</h1>
                @endif            
                </div>
        </div>
    </div>
@endsection