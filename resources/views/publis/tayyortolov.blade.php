@extends('publis.dashbord')
@section('title','Guruh Royhati')
@section('control')
    <div class="container-fluid">
        <h2 style="text-align: center">{{ $date->number }}:{{ $date->category }} Guruhning To`lov ro`yxati</h2>
        <form action="{{ route('show',$date->number) }}" method="GET">
            <input type="hidden" name="number" value="{{ $date->number }}">
            <input type="hidden" name="category" value="{{ $date->category }}">
            <input type="hidden" name="summa" value="{{ $date->summa  }}">
            <button type="submit" class="btn btn-info">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left" viewBox="0 0 16 16">
                    <path d="M10 12.796V3.204L4.519 8 10 12.796zm-.659.753-5.48-4.796a1 1 0 0 1 0-1.506l5.48-4.796A1 1 0 0 1 11 3.204v9.592a1 1 0 0 1-1.659.753z"></path>
                    </svg>
                    Guruhga qaytish
            </button>
        </form> 
          <hr>
            <div class="row">
                
                    <table class="table table-hover">
                        <thead>
                            <th>№</th>
                            <th>Guruh</th>
                            <th>Katigoriya</th>
                            <th>Ism</th>
                            <th>Familiya</th>
                            <th>Tel..</th>
                            <th>Tugilgan sana</th>
                            <th>Passport seriya</th>
                            <th>Yashash joyi</th>                            
                            <th>Holati</th>
                            <th>To'lov Summa</th>
                          
                        </thead>
                        @foreach ($data as $item)                           
                        <tr>
                            <td>{{ (($data->currentpage()-1) * $data->perpage() + ($loop->index+1)) }}</td>
                            <td>{{ $item->group_id }}</td>
                            <td>{{ $item->cagigory }}</td>
                            <td>{{ $item->firstname }}</td>
                            <td>{{ $item->lastname }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->birthdata }}</td>
                            <td>{{ $item->seriya }}</td>
                            <td>{{ $item->adress }}</td>
                            @if ($date->summa == $item->jamis)
                                <td style="color: rgb(0, 206, 0)">To`liq holda</td>
                                <td style="color: rgb(0, 206, 0)"><h5>{{ $item->jamis }}</h5></td>
                            @elseif($date->summa > $item->jamis)
                            <td style="color: rgb(247, 25, 0)">To`liq emas</td>
                            <td style="color: rgb(247, 25, 0)"><h5>{{ $item->jamis }}</h5></td>                                
                            @endif
                        @endforeach
                        </tr>
                    </table>
                    <div class="col-10"></div>
                <div class="col-2">
                    <h2 class="h">{{ $sum->jamipay }}</h2>
                </div>
            </div>    
    </div>
@endsection