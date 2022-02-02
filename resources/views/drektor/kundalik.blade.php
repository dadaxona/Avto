@extends('drektor.dashbordnachal')
@section('title','Kundalik o`zgarishlar')
@section('controlnachal')
<div class="container-fluid">
    <div class="row">

             <h1>Kundalik O`zgarishlar</h1> 
            <form action="{{ route('index.search') }}" method="GET" class="d-flex">
            @csrf
                <div class="col-10 me-2">
                    <input class="form-control" type="date" name="search">
                    <span class="text-danger">@error('search') {{$message}}@enderror</span>  
                </div>
                <div class="col-2 me-4">
                    <button class="btn btn-success" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>                      
                        </button>
                </div>
            </form>
       
      
        <hr>
            <h1>O`quvchilar</h1>
            <table class="table table-dark table-hover">
                <thead>
                    <th>Guruh</th>
                    <th>Catigoriya</th>
                    <th>Ism</th>
                    <th>Familiya</th>
                    <th>Telefon</th>
                    <th>Yashash joyi</th>
                </thead>
                @foreach($pip as $p)
                        <tr>
                            <td>{{ $p->group_id }}</td>
                            <td>{{ $p->cagigory }}</td>
                            <td>{{ $p->firstname }}</td>
                            <td>{{ $p->lastname }}</td>
                            <td>{{ $p->phone }}</td>
                            <td>{{ $p->adress }}</td>                                                   
                        </tr>                
                @endforeach
                </table>
                <h1>To`lovlar</h1>
                <table class="table table-dark table-hover"> 
                    <thead>
                        <th>Guruh</th>
                        <th>Ism</th>
                        <th>Familiya</th>
                        <th>To`lov</th>
                        <th>Vaqt</th>
                    </thead>           
                @foreach($pay as $pa)
                        <tr>
                            <td>{{ $pa->group_id }}</td>
                            <td>{{ $pa->firstname }}</td>
                            <td>{{ $pa->lastname }}</td>
                            <td>{{ $pa->payment }}</td>
                            <td>{{ $pa->data }}</td>                                                   
                        </tr>                
                        @endforeach
                </table>
                <h1>O`qituvchi</h1>
                <table class="table table-dark table-hover">
                    <thead>
                        <th>Ism</th>
                        <th>Familiya</th>
                        <th>Telefon</th>
                        <th>Yashash joyi</th>
                    </thead>
                @foreach($tech as $ps)
                        <tr>
                            <td>{{ $ps->firstname }}</td>
                            <td>{{ $ps->lastname }}</td>
                            <td>{{ $ps->phone }}</td>
                            <td>{{ $ps->adress }}</td>                                                       
                        </tr>                
                        @endforeach
                </table>
            <h1>Instruktor</h1>
            <table class="table table-dark table-hover">   
                    <thead>
                        <th>Ism</th>
                        <th>Familiya</th>
                        <th>Telefon</th>
                        <th>Yashash joyi</th>
                    </thead>     
                @foreach($cate as $pd)
                        <tr>
                            <td>{{ $pd->firstname }}</td>
                            <td>{{ $pd->lastname }}</td>
                            <td>{{ $pd->phone }}</td>
                            <td>{{ $pd->adress }}</td>                                                       
                        </tr>                
                        @endforeach
                </table>
                <h1>Avtomobil</h1>
                <table class="table table-dark table-hover"> 
                    <thead>
                        <th>Avtomobil rusumi</th>
                        <th>Davlat raqami</th>
                        <th>Ishlab chiqarilgan sana</th>
                    </thead>           
                    @foreach($auto as $pda)
                        <tr>
                            <td>{{ $pda->mashina }}</td>
                            <td>{{ $pda->nomer }}</td>
                            <td>{{ $pda->yil }}</td>                                                                              
                        </tr>                
                        @endforeach
                </table>

                <h1>Avtomobil xarajatlar</h1>
                <table class="table table-dark table-hover"> 
                    <thead>
                        <th>Avtomobil rusumi</th>
                        <th>Davlat raqami</th>
                        <th>Ishga chiqqan sana</th>
                        <th>Ishdan oldingi masofasi</th>
                        <th>Ishdan keyingi masofa </th>
                        <th>Ishdan oldingi qoldiq yoqilgi</th>
                        <th>Ishdan keyingi qoldiq yoqilgi</th>
                        <th>Ishga keyingi masofa</th>
                        <th>Ishga paytida sarflagan yoqilgi</th>
                        <th>Qolgan yoqilgi</th>
                    </thead>
                    @foreach($autox as $pda)
                        <tr>
                            <td>{{ $pda->mashina }}</td>
                            <td>{{ $pda->nomer }}</td>
                            <td>{{ $pda->data }}</td>
                            <td>{{ $pda->masofa }}</td>
                            <td>{{ $pda->finish }}</td>                                                                              
                            <td>{{ $pda->benzin }}</td>                                                                              
                            <td>{{ $pda->solingan }}</td>                                                                              
                            <td>{{ $pda->masofav }}</td>                                                                              
                            <td>{{ $pda->benzinrashot }}</td>                                                                              
                            <td>{{ $pda->qoldiqbenzin }}</td>                                                                              
                                                                                                    
                        </tr>                
                    @endforeach
                </table>
            
        </div>     
    </div>
@endsection