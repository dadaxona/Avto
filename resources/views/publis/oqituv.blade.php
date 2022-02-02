@extends('publis.dashbord')
@section('title','O`qtuvchini Ro`yhatga olish')

@section('control')
    
<div class="container-fluid">
    <div class="row">
       
            <h1 style="text-align: center">O'qituvchilarni Royhatga Olish</h1>
            <hr>
            <form action="{{ route('create2') }}" method="POST">
                <div class="row">
           
                    @csrf
                    <div class="col-6">
                        <div class="form-group">
                            <label for="exampleFormControlInput1" class="form-label">Ism Familiya</label>
                            <input type="text" class="form-control" placeholder="Ism Familiya" name="firstname"  value="{{old('firstname')}}">
                            <span class="text-danger">@error('firstname') {{$message}}@enderror</span>
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
                        
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">Passport Seriya</label>
                                <input type="text" class="form-control" placeholder="AA0123456" name="seriya"  value="{{old('seriya')}}">
                                <span class="text-danger">@error('seriya') {{$message}}@enderror</span>
                            </div>       
                        </div>  
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">Yashash Joyi</label>
                                <input type="text" class="form-control" placeholder="Yashash Joyi" name="adress"  value="{{old('adress')}}">
                                <span class="text-danger">@error('adress') {{$message}}@enderror</span>
                            </div>
                        </div>
                        <input type="hidden" name="status" value="0">
                        <div class="form-group" style="margin-top: 4px">
                            <button type="submit" class="btn btn-success">Kiritish</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12">
                <table class="table table-hover">
                    <thead>                      
                        <th>Ism Familiya</th>                        
                        <th>Tel..</th>
                        <th>Tugilgan sana</th>
                        <th>Passport seriya</th>
                        <th>Yashash joyi</th>                        
                        <th>Yangilash</th>
                        <th>O'chirish</th>                       
                    </thead>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->firstname }}</td>                  
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->birthdata }}</td>
                            <td>{{ $item->seriya }}</td>
                            <td>{{ $item->adress }}</td>                         
                            <td><a href="{{ route('edit2',$item->id) }}" class="btn btn-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"></path>
                                    </svg>
                                    {{-- Yangilash --}}
                                </a></td>
                            <td>  
                                <form method="POST" class="delete_form" action="{{ route('delete3',$item->id)}}">
                                    @csrf                                       
                                    <button type="submit" class="btn btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                            </svg>
                                            {{-- O'chirish --}}
                                        </button>                                        
                                </form>              

                            </td>  
                        </tr>
                        @endforeach
                    </table>
                    
              
            </div>
        </div>
    @endsection