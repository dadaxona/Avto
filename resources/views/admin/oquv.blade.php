
@extends('admin.dashbordadmin')
@section('title','Guruh Royhati')
@section('controlad')
<div class="container-fluid">
        <h2 style="text-align: center">{{ $date->number }}:{{ $date->category }} - Guruh Royhati </h2>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            @if ($counter < 1)
                
            @else
            <form action="{{ route('export') }}" method="GET">
                <input type="hidden" name="group_id" value="{{ $date->id }}">
                <input type="hidden" name="number" value="{{ $date->number }}">
                <input type="hidden" name="category" value="{{ $date->category }}">                
                <button type="submit" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-up" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 10a.5.5 0 0 0 .5-.5V3.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 3.707V9.5a.5.5 0 0 0 .5.5zm-7 2.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                    Exsel failga olish
                </button>
            </form>
            <form action="{{ route('index2admins',$date->id) }}" method="GET">
                <input type="hidden" name="number" value="{{ $date->number }}">
                <input type="hidden" name="category" value="{{ $date->category }}">
                <input type="hidden" name="summa" value="{{ $date->summa  }}">
                <button type="submit" class="btn btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-exchange" viewBox="0 0 16 16">
                        <path d="M0 5a5.002 5.002 0 0 0 4.027 4.905 6.46 6.46 0 0 1 .544-2.073C3.695 7.536 3.132 6.864 3 5.91h-.5v-.426h.466V5.05c0-.046 0-.093.004-.135H2.5v-.427h.511C3.236 3.24 4.213 2.5 5.681 2.5c.316 0 .59.031.819.085v.733a3.46 3.46 0 0 0-.815-.082c-.919 0-1.538.466-1.734 1.252h1.917v.427h-1.98c-.003.046-.003.097-.003.147v.422h1.983v.427H3.93c.118.602.468 1.03 1.005 1.229a6.5 6.5 0 0 1 4.97-3.113A5.002 5.002 0 0 0 0 5zm16 5.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0zm-7.75 1.322c.069.835.746 1.485 1.964 1.562V14h.54v-.62c1.259-.086 1.996-.74 1.996-1.69 0-.865-.563-1.31-1.57-1.54l-.426-.1V8.374c.54.06.884.347.966.745h.948c-.07-.804-.779-1.433-1.914-1.502V7h-.54v.629c-1.076.103-1.808.732-1.808 1.622 0 .787.544 1.288 1.45 1.493l.358.085v1.78c-.554-.08-.92-.376-1.003-.787H8.25zm1.96-1.895c-.532-.12-.82-.364-.82-.732 0-.41.311-.719.824-.809v1.54h-.005zm.622 1.044c.645.145.943.38.943.796 0 .474-.37.8-1.02.86v-1.674l.077.018z"/>
                      </svg>
                      Tayyor tolovlar
                </button>
            </form>               
            @endif
            </div>
            <hr>       
                <div class="row">
             
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                        <th>№</th>
                        <th>Guruh</th>
                        <th>Katigoriya</th>
                        <th>Ism</th>
                        <th>Familiya</th>
                        <th>O`chestvo</th>
                        <th>Tel..</th>
                        <th>Tugilgan sana</th>
                        <th>Malumoti</th>
                        <th>Passport seriya</th>
                        <th>Tuman</th>
                        <th>Yashash joyi</th>
                        <th>Yangilash</th>
                        <th>O'chirish</th>                      
                    </thead>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ (($data->currentpage()-1) * $data->perpage() + ($loop->index+1)) }}</td>
                            <td>{{ $item->group_id }}</td>
                            <td>{{ $item->cagigory }}</td>
                            <td>{{ $item->firstname }}</td>
                            <td>{{ $item->lastname }}</td>
                            <td>{{ $item->ochestvo }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->birthdata }}</td>
                            <td>{{ $item->malumoti }}</td>
                            <td>{{ $item->seriya }}</td>
                            <td>{{ $item->adress }}</td>
                            <td>{{ $item->adress2 }}</td>
                            <td><a href="{{ route('editadmiral',$item->id) }}" class="btn btn-success"> 
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"></path>
                                    </svg>
                                    {{-- Yangilash --}}
                                </a></td>
                            <td>  
                                <form method="POST" class="delete_form" action="{{ route('delete',$item->id)}}">
                                    @csrf
                                    <input type="hidden" name="publi_id" value="{{ $item->id }}">
                                    <input type="hidden" name="group_id" value="{{ $date->number }}">
                                    <input type="hidden" name="cagigory" value="{{ $date->category }}">
                                    <input type="hidden" name="summa" value="{{ $date->summa }}">
                                    <input type="hidden" name="firstname" value="{{ $item->firstname }}">
                                    <input type="hidden" name="lastname" value="{{ $item->lastname }}">
                                    <input type="hidden" name="ochestvo" value="{{ $item->ochestvo }}">
                                    <input type="hidden" name="phone" value="{{ $item->phone }}">
                                    <input type="hidden" name="birthdata" value="{{ $item->birthdata }}">
                                    <input type="hidden" name="malumoti" value="{{ $item->malumoti }}">
                                    <input type="hidden" name="seriya" value="{{ $item->seriya }}">
                                    <input type="hidden" name="adress" value="{{ $item->adress }}">
                                    <input type="hidden" name="adress2" value="{{ $item->adress2 }}">
                                    <input type="hidden" name="jamis" value="{{ $item->jamis }}">
                                    <input type="hidden" name="kundata" value="{{ $item->kundata }}">
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
                {{ $data->links() }}
            </div>
        </div>    
    </div>
@endsection