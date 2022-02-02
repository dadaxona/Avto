
@extends('admin.dashbordadmin')
@section('title','Guruh Royhati')

@section('controlad')
<div class="container-fluid">
    <div class="row pt-2">  
        <div class="alert alert-danger" style="text-align: center">                        
            <h2 style="text-align: center">O'quvchi {{ $date->number }}:{{ $date->category }} - Guruh Ro'yhatida Mavjud </h2>
                <table class="table table-hover">            
                    <tr>
                        <td>{{ $item->firstname }}</td>
                        <td>{{ $item->lastname }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->birthdata }}</td>
                        <td>{{ $item->seriya }}</td>
                        <td>{{ $item->adress }}</td>
                        <td>{{ $item->inn }}</td>
                   
                        <td><a href="{{ route('tolov',$item->id) }}" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"></path>
                                <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"></path>
                                <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"></path>
                                <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"></path>
                                </svg>
                            To'lov Malumoti
                        </a></td>
                    </tr>                
                </table>
            </div>        
            
                <div class="alert alert-success" style="text-align: center">   
                    <h3>Bu o'quvchini {{ $mode->number }}:{{ $mode->category }}ga qo'shishni hohlaysizmi</h3>
                </div>
                    <hr>
                    <form action="{{ route('new.stor2') }}" method="POST">                    
                        @csrf                    
                       <div class="row">
                            <input type="hidden" name="group_id" value="{{ $req->group_id }}">                           
                            <input type="hidden" name="cagigory" value="{{ $req->cagigory }}">
                            <input type="hidden" name="summa" value="{{ $req->summa }}">
                        <div class="form-group col-6">
                            <label for="exampleFormControlInput1" class="form-label">Ism</label>
                            <input type="text" class="form-control" placeholder="Ism" name="firstname"  value="{{$req->firstname}}">
                            <span class="text-danger">@error('firstname') {{$message}}@enderror</span>
                        </div>
                        <div class="form-group col-6">
                            <label for="exampleFormControlInput1" class="form-label">Familiya</label>
                            <input type="text" class="form-control" placeholder="Familiya" name="lastname"  value="{{$req->lastname}}">
                            <span class="text-danger">@error('lastname') {{$message}}@enderror</span>
                        </div>  
                        <div class="form-group col-6">
                            <label for="exampleFormControlInput1" class="form-label">Telefon</label>
                            <input type="number" class="form-control" placeholder="+998..." name="phone"  value="{{$req->phone}}">
                            <span class="text-danger">@error('phone') {{$message}}@enderror</span>
                        </div>   
                        <div class="form-group col-6">
                            <label for="exampleFormControlInput1" class="form-label">Tugilgan Sana</label>
                            <input type="date" class="form-control" placeholder="Tugilgan Sana" name="birthdata"  value="{{$req->birthdata}}">
                            <span class="text-danger">@error('birthdata') {{$message}}@enderror</span>
                        </div>   
                        <div class="form-group col-6">
                            <label for="exampleFormControlInput1" class="form-label">Passport Seriya</label>
                            <input type="text" class="form-control" placeholder="AA0123456" name="seriya"  value="{{$req->seriya}}">
                            <span class="text-danger">@error('seriya') {{$message}}@enderror</span>
                        </div>   
                        <div class="form-group col-6">
                            <label for="exampleFormControlInput1" class="form-label">Yashash Joyi</label>
                            <input type="text" class="form-control" placeholder="Yashash Joyi" name="adress"  value="{{$req->adress}}">
                            <span class="text-danger">@error('adress') {{$message}}@enderror</span>
                        </div>
                        <div class="col-4 pt-2">                        
                            <input class="form-check-input" type="checkbox" name="jamis" value="0" id="flexCheckDefault" checked>
                            <span class="text-danger">@error('jamis') {{$message}}@enderror</span>                        
                        </div>
                    </div>
                        <br>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="/dashbord" class="btn btn-danger">Orqaga</a>
                            <button type="submit" class="btn btn-success">Ruxsat berish</button>

                        </div>
                    </form>
                </div> 
          
    </div>
@endsection