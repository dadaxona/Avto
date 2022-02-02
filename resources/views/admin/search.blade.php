@extends('admin.dashbordadmin')
@section('title','Guruh Royhati')
@section('controlad')
    <div class="container-fluid">
        <div class="row">
            <h2>Filtr boicha izlang</h2>
     
            <form action="{{ route('admingetlistsearch') }}" method="GET" class="d-flex">
                @csrf          
                <div class="col-2 me-4">
                    <select name="ustum" class="form-control" style="color: #6c757d;">                     
                        <option value="publis">Oquvchi</option>
                        <option value="teacher">Oqtuvchi</option>
                        <option value="instruqtor">Instruqtor</option>               
                    </select>
                </div>
                <div class="col-2 me-4">
                    <select name="cate" class="form-control" style="color: #6c757d;">
                        <option value="" >Katigo'riya</option>
                        <option value="B">B</option>
                        <option value="BC">BC</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                    </select>
                    <span class="text-danger">@error('cate') {{$message}}@enderror</span>
                </div>
                <div class="col-2 me-4">
                    <input class="form-control" type="text" name="name" placeholder="name">
                    <span class="text-danger">@error('name') {{$message}}@enderror</span>  
                </div>
                <div class="col-2 me-4">
                    <input class="form-control" type="text" name="seriya"placeholder="seriya">
                    <span class="text-danger">@error('seriya') {{$message}}@enderror</span>  
                </div>
                <div class="col-2 me-4">
                    <button class="btn btn-success" type="submit">Izlash</button>
                </div>
            </form>  

                @if($item)
                <h2>O'quvchi</h2>
                <table class="table table-dark table-hover">
                    <thead>                          
                        <th>Ism</th>
                        <th>Familiya</th>
                        <th>Tel..</th>
                        <th>Tugilgan sana</th>
                        <th>Passport seriya</th>
                        <th>Yashash joyi</th>                        
                    </thead>                                    
                    @foreach($item as $aaa)                        
                    <tbody>
                        <td>{{ $aaa->firstname }}</td>
                        <td>{{ $aaa->lastname }}</td>
                        <td>{{ $aaa->phone }}</td>
                        <td>{{ $aaa->birthdata }}</td>
                        <td>{{ $aaa->seriya }}</td>
                        <td>{{ $aaa->adress }}</td> 
                    </tbody>
                    @endforeach
                </table>
               
                @elseif($a)
                <h2>O'qtuvchi</h2>
                <table class="table table-dark table-hover">
                    <thead>                          
                        <th>Ism</th>
                        <th>Familiya</th>
                        <th>Tel..</th>
                        <th>Tugilgan sana</th>
                        <th>Passport seriya</th>
                        <th>Yashash joyi</th>                 
                        
                    </thead>
                    <tbody>                            
                        <td>{{ $a->firstname }}</td>
                        <td>{{ $a->lastname }}</td>
                        <td>{{ $a->phone }}</td>
                        <td>{{ $a->birthdata }}</td>
                        <td>{{ $a->seriya }}</td>
                        <td>{{ $a->adress }}</td> 
                    </tbody>
                </table> 
                @elseif($b)
                <h2>Instruqto'r</h2>
                <table class="table table-dark table-hover">
                    <thead>                          
                        <th>Ism</th>
                        <th>Familiya</th>
                        <th>Tel..</th>
                        <th>Tugilgan sana</th>
                        <th>Passport seriya</th>
                        <th>Yashash joyi</th>                        
                    </thead>
                    <tbody>                            
                        <td>{{ $b->firstname }}</td>
                        <td>{{ $b->lastname }}</td>
                        <td>{{ $b->phone }}</td>
                        <td>{{ $b->birthdata }}</td>
                        <td>{{ $b->seriya }}</td>
                        <td>{{ $b->adress }}</td> 
                    </tbody>
                </table> 
                @endif      
            </div>    
    </div>
@endsection