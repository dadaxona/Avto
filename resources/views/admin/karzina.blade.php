
@extends('admin.dashbordadmin')
@section('title','O`chgan o`quvchilarni tiklash')

@section('controlad')
<div class="container-fluid">
    <div class="row pt-2">  
        <h2 style="text-align: center"> Malumotlarini qayta tiklash</h2>
        <form action="{{ route('tozalashadmin') }}" method="POST">
            @csrf
            <input type="hidden" name="del" value="0">
            <button type="submit" class="btn btn-danger mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                </svg>
                Tozalash
            </button>
        </form>
            <table class="table table-dark table-hover">            
                @foreach($data as $item)
                <tr>
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
                    <td>
                        <form action="{{ route('creates',$item->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="publi_id" value="{{ $item->publi_id }}">
                            <input type="hidden" name="group_id" value="{{ $item->group_id }}">
                            <input type="hidden" name="cagigory" value="{{ $item->cagigory  }}">
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
                            <button type="submit" class="btn btn-success">Tiklash</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>     
    </div>
@endsection