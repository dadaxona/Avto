@extends('admin.dashbordadmin')
@section('controlad')
    {{-- <div class="row">
        <h2>Izlash</h2>     
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
                <input class="form-control" type="text" name="name" placeholder="Ism yoki Familiya">
                <span class="text-danger">@error('name') {{$message}}@enderror</span>  
            </div>
            <div class="col-2 me-4">
                <input class="form-control" type="text" name="seriya"placeholder="Passport seriya">
                <span class="text-danger">@error('seriya') {{$message}}@enderror</span>  
            </div>
            <div class="col-2 me-4">
                <button class="btn btn-success" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                      </svg>                      
                    </button>
            </div>
        </form>      
    </div> --}}
<br>
<h1>Guruh Yaratish</h1>
<div class="row">
<form action="{{ route('creategroupadmin') }}" method="POST" class="d-flex">
    @csrf
            <div class="col-3 m-2">
              
                    <input type="number" class="form-control" placeholder="N1 ..." name="number"  value="{{old('number')}}">
                    <span class="text-danger">@error('number') {{$message}}@enderror</span>                
            </div>
            <div class="col-3 m-2">
           
                <select name="category" class="form-control" style="color: #6c757d;">
                <option value="" >Katigo'riya</option>
                <option value="B">B</option>
                <option value="B-C">B-C</option>
                <option value="BC">BC</option>
                <option value="D">D</option>
                <option value="E">E</option>
                </select>
                <span class="text-danger">@error('category') {{$message}}@enderror</span>            
            </div>
            
            <div class="col-3 m-2">
            
                <input type="text" class="form-control" placeholder="Kurs narxini kiriting" name="summa"  value="{{old('summa')}}">
                <span class="text-danger">@error('summa') {{$message}}@enderror</span>
            </div>
            <input type="hidden" name="oqtuvci">
            <input type="hidden" name="qonstruq">
            <input type="hidden" name="qonstruq2">
            <input type="hidden" name="qonstruq3">
            <input type="hidden" name="mashina">
            <input type="hidden" name="mashina2">
            <input type="hidden" name="mashina3">
            <input type="hidden" name="data">
            <input type="hidden" name="data2">
            <div class="col-3 m-2">
                <button class="btn btn-primary" type="submit">Yangi guruh yaratish</button>
            </div>
        </form>
    </div>
    <br>
  
<div class="row">
    <div  class="container-fluid">
            <table class="table table-dark table-hover" id="wid">
                <thead>
                    <th>№</th>
                    <th>Guruhlar</th>
                    <th>Catigoriylar</th>
                    <th>To'lov Narxi</th>
                    <th>Masul O'qituvchi</th>
                    <th>Masul Ionstruktor</th>
                    <th>Qo`shimcha Ionstruktor</th>
                    <th>Qo`shimcha Ionstruktor</th>
                    <th>Mashina</th>
                    <th>Qo'shimcha Mashina</th>
                    <th>Qo'shimcha Mashina</th>
                    <th>Tugash Vaqti</th>
                    <th>Yangilash</th>
                    <th>O'quvchi Qo'shish</th>
                    <th>O'quvchi Sonini Ko'rish</th>
                </thead>
                @foreach ($col as $item)
                    <tr>
                        <td>{{ (($col->currentpage()-1) * $col->perpage() + ($loop->index+1)) }}</td>
                        <td>{{ $item->number }}</td>
                        <td>{{ $item->category }}</td>
                        <td>{{ $item->summa }}</td>
                        <td>{{ $item->oqtuvci }}</td>
                        <td>{{ $item->qonstruq }}</td>
                        <td>{{ $item->qonstruq2 }}</td>
                        <td>{{ $item->qonstruq3 }}</td>
                        <td>{{ $item->mashina }}</td>
                        <td>{{ $item->mashina2 }}</td>
                        <td>{{ $item->mashina3 }}</td>
                        <td>{{ $item->data }}</td>
                        <td>
                            <a href="{{ route('indexsadmin',$item->id) }}" class="btn btn-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"></path>
                                </svg>
                                {{-- Yangilash --}}
                            </a>
                        </td>
                        <td><a href="{{ route('indexadmine',$item->number) }}" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                              </svg>
                                {{-- O'quvchi Qo'shish --}}
                            </a></td>                                                       
                        <td>
                            <form action="{{ route('showadmin',$item->number) }}" method="GET">
                                <input type="hidden" name="number" value="{{ $item->number }}">
                                <input type="hidden" name="category" value="{{ $item->category }}">
                                <input type="hidden" name="summa" value="{{ $item->summa  }}">
                                <button type="submit" class="btn btn-info">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16">
                                    <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                                    </svg>
                                    {{-- Guruh Malumotlari --}}
                                </button>
                            </form>                        
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $col->links() }}
        </div>
    </div> 
@endsection