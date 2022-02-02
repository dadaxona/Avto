@extends('publis.dashbord')
@section('title','Avtomobillar harajati')
@section('control')  
<div class="container-fluid">  
 
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('avto') }}" class="btn btn-info">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left" viewBox="0 0 16 16">
                        <path d="M10 12.796V3.204L4.519 8 10 12.796zm-.659.753-5.48-4.796a1 1 0 0 1 0-1.506l5.48-4.796A1 1 0 0 1 11 3.204v9.592a1 1 0 0 1-1.659.753z"></path>
                        </svg>
                        Qaytish
                    </a>
                    <form action="{{ route('exports') }}" method="GET">
                        <input type="hidden" name="id" value="{{ $date->id }}">
                        <input type="hidden" name="mashina" value="{{ $date->mashina }}">
                        <input type="hidden" name="nomer" value="{{ $date->nomer }}">                
                        <button type="submit" class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-up" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 10a.5.5 0 0 0 .5-.5V3.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 3.707V9.5a.5.5 0 0 0 .5.5zm-7 2.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5z"/>
                              </svg>
                              Exsel failga olish
                        </button>
                    </form>
                </div>
    <div class="row">
        <form action="{{ route('avtosearch') }}" method="GET" class="d-flex mt-2 col-12">   
            @csrf
            <input type="hidden" name="auto_id" value="{{ $date->id }}">
            <input type="number" class="form-control me-1" name="data2" placeholder="1990">
            <input type="number" class="form-control me-1" name="data" placeholder="01">
            <button type="submit" class="btn btn-info">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                  </svg> 
            </button>
        </form>
        <h1>{{ $date->mashina }} - {{ $date->nomer }}</h1>
        <table class="table table-dark table-striped">
            <thead>
                <th>№</th>
                <th>Sana</th>            
                <th>Saroydan chiqish</th>
                <th>Saroyga kirish</th>
                <th>Saroyga kirish</th>
                <th>Ish boshlashga koldik benzin</th>
                <th>Olindi</th>
                <th>Yurildi</th>
                <th>Sariflangan benzin</th>
                <th>Ish oxirida qoldik benzin</th>
            </thead>
            @foreach ($avto as $item)
                <tr>
                    <td>{{ (($avto->currentpage()-1) * $avto->perpage() + ($loop->index+1)) }}</td>
                    <td>{{ $item->avto_id }}</td>
                    <td>{{ $item->data }}</td>
                    <td>{{ $item->masofa }}</td>
                    <td>{{ $item->finish }}</td>
                    <td>{{ $item->benzin }}</td>
                    <td>{{ $item->solingan }}</td>
                    <td>{{ $item->masofav }}</td>
                    <td>{{ $item->benzinrashot }}</td>
                    <td>{{ $item->qoldiqbenzin }}</td>                   
                </tr>
            @endforeach
        </table>
        {{ $avto->links() }}       
    </div>


@endsection