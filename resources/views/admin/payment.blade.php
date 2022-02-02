
@extends('admin.dashbordadmin')
@section('title','To`lov')
@section('controlad')
    <div class="container-fluid pt-2">      
          <form action="{{ route('show',$group->id) }}" method="GET">
            <input type="hidden" name="number" value="{{ $group->number }}">
            <input type="hidden" name="category" value="{{ $group->category }}">
            <input type="hidden" name="summa" value="{{ $group->summa  }}">
            <button type="submit" class="btn btn-info">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left" viewBox="0 0 16 16">
                    <path d="M10 12.796V3.204L4.519 8 10 12.796zm-.659.753-5.48-4.796a1 1 0 0 1 0-1.506l5.48-4.796A1 1 0 0 1 11 3.204v9.592a1 1 0 0 1-1.659.753z"></path>
                    </svg>
                    Guruhga qaytish
            </button>
        </form>
           
        <h1>{{ $date->firstname }} {{ $date->lastname }}</h1>
        <br>
            @if ($group->summa <= $jami->jamis)
                <div class="row">
                    <div class="alert alert-success" style="text-align: center">
                        <h4>To'lov To'langan</h4>
                    </div>
                </div>
            @else
      
            <form action="{{ route('store2') }}" method="POST">
        
                @csrf
                <input type="hidden" name="publi_id" value="{{ $date->id }}">
                <input type="hidden" name="group_id" value="{{ $group->id }}">
                <input type="hidden" name="category" value="{{ $group->category }}">
                <input type="hidden" name="firstname" value="{{ $date->firstname }}">
                <input type="hidden" name="lastname" value="{{ $date->lastname }}">
                <div class="row">
                    <div class="col-4">
                        <input type="number" class="form-control" placeholder="Tolov summa" name="payment"  value="{{old('payment')}}">
                        <span class="text-danger">@error('payment') {{$message}}@enderror</span>
                    </div>
                    <div class="col-4">
                        <input type="date" class="form-control" placeholder="Tolov vaqti" name="data"  value="{{old('data')}}">
                        <span class="text-danger">@error('data') {{$message}}@enderror</span>
                    </div>
                  
                    <div class="col-2">                        
                        <input class="form-check-input" type="checkbox" name="status" value="true" id="flexCheckDefault" checked>
                        <span class="text-danger">@error('status') {{$message}}@enderror</span>                        
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-info">Kiritish</button>
                    </div>            
                </div>
            </form>                                           
        @endif
        <hr>       
        <div class="row">
            <div class="col-12">
                <table class="table table-hover">
                    <tr>
                        <th>№</th>
                        <th>Guruh</th>
                        <th>To'lovlar</th>
                        <th>Vaqti</th>
                        <th>O'chirish</th>
                    </tr>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ (($data->currentpage()-1) * $data->perpage() + ($loop->index+1)) }}</td>
                            <td>{{ $item->group_id }}</td>
                            <td>{{ $item->payment }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>  
                                @if ($group->summa <= $jami->jamis)
                                <button class="btn btn-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                    </svg>
                                        {{-- O'chirish --}}
                                    </button> 
                                @else
                                <form method="POST" class="delete_form" action="{{ route('jamisum.destroy',$item->id)}}">
                                    @method("DELETE")
                                    @csrf
                                    <input type="hidden" name="publi_id" value="{{ $date->id }}">
                                    <input type="hidden" name="group_id" value="{{ $group->id }}">
                                    <input type="hidden" name="category" value="{{ $group->category }}">                                  
                                    <input type="hidden" name="for_id" value="{{$item->id}}">
                                    <input type="hidden" name="payment" value="{{$item->payment}}">
                                    <button type="submit" class="btn btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                            </svg>
                                        {{-- O'chirish --}}
                                    </button>
                                </form>
                                @endif
                            </td>                
                        </tr>
                    @endforeach
                </table>
                {{ $data->links() }}
                <hr>   
            </div>
            @if ($jami->jamis <= 0)
            <div class="alert alert-danger">
                <h4 style="color: red">Jami to'lov: {{$jami->jamis}}</h4> 
            </div>
            @else
            <div class="alert alert-info">
                <h4>Jami to'lov: {{$jami->jamis}}</h4>                                
            </div>
            @endif
        </div>   
    </div>
@endsection