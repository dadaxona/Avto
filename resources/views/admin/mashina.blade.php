
@extends('admin.dashbordadmin')
@section('title','Avtomobillarni Ro`yhatga Olish')

@section('controlad')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">                
                <h2 style="text-align: center">Avtomobil qoshish</h2>
                <form action="{{ route('new.storcadmin') }}" method="POST">
         
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">Avtomobil rusumi</label>
                                <input type="text" class="form-control" placeholder="Avtomobil rusumi" name="mashina"  value="{{old('mashina')}}">
                                <span class="text-danger">@error('mashina'){{$message}}@enderror</span>
                            </div>  
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">Davlat raqami</label>
                                <input type="text" class="form-control" placeholder="Davlat raqami" name="nomer"  value="{{old('nomer')}}">
                                <span class="text-danger">@error('nomer'){{$message}}@enderror</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">Ishlab chiqarilgan vaqt</label>
                                <input type="date" class="form-control" placeholder="Ishlab chiqarilgan sana" name="yil" value="{{old('yil')}}">
                                <span class="text-danger">@error('yil'){{$message}}@enderror</span>
                            </div>   
                        </div>                                           
                    </div>                   
                    <br>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
                        <button type="submit" class="btn btn-success">Kiritish</button>
                    </div>
                </form>
       
           <hr>
                <table class="table table-hover">
                    <thead>                      
                        <th>Avtomobil rusumi</th>
                        <th>Davlar Raqami</th>
                        <th>Ishlabchiqarilgan sana</th>                                           
                        <th>Yangilash</th>
                        <th>O'chirish</th>                       
                    </thead>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->mashina }}</td>
                        <td>{{ $item->nomer }}</td>
                            <td>{{ $item->yil }}</td>                                              
                            <td><a href="{{ route('adminavtoedit',$item->id) }}" class="btn btn-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"></path>
                                    </svg>
                                    {{-- Yangilash --}}
                                </a></td>
                            <td>  
                                <form method="POST" class="delete_form" action="{{ route('new.storeccdelete',$item->id)}}">
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
    </div>
@endsection