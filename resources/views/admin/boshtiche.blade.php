
@extends('admin.dashbordadmin')
@section('title','Bo`sh o`qtuvchilar')
@section('controlad')
<div class="container-fluid">

    <div class="row">
        <h1>Bo`sh O`qituvchi</h1> 
        <table class="table table-dark table-striped">
            <thead>
                <th>№</th>
                <th>Ism Familiya</th>            
                <th>Tel..</th>
                <th>Tugilgan sana</th>
                <th>Passport seriya</th>
                <th>Yashash joyi</th>                        
             
            </thead>
            @foreach ($teacher as $item)
                <tr>
                    <td>{{ (($teacher->currentpage()-1) * $teacher->perpage() + ($loop->index+1)) }}</td>
                    <td>{{ $item->firstname }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->birthdata }}</td>
                    <td>{{ $item->seriya }}</td>
                    <td>{{ $item->adress }}</td>
              
                </tr>
            @endforeach
        </table>
        {{ $teacher->links() }}
        <br>
        <h1>Bo`sh Instrukto`r</h1> 
        <table class="table table-dark table-striped">
            <thead>
                <th>№</th>
                <th>Ism Familiya</th>            
                <th>Tel..</th>
                <th>Tugilgan sana</th>
                <th>Passport seriya</th>
                <th>Yashash joyi</th>                        
             
            </thead>
            @foreach ($catigor as $item)
                <tr>
                    <td>{{ (($catigor->currentpage()-1) * $catigor->perpage() + ($loop->index+1)) }}</td>
                    <td>{{ $item->firstname }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->birthdata }}</td>
                    <td>{{ $item->seriya }}</td>
                    <td>{{ $item->adress }}</td>
                            
                </tr>
            @endforeach
        </table>
        {{ $catigor->links() }}
        <hr>

        <h1>Bant O`qituvchi</h1> 
        <table class="table table-dark table-striped">
            <thead>
                <th>№</th>
                <th>Ism Familiya</th>            
                <th>Tel..</th>
                <th>Tugilgan sana</th>
                <th>Passport seriya</th>
                <th>Yashash joyi</th>
                <th>Aktiv qilish</th>
             
            </thead>
            @foreach ($collection as $item)
                <tr>
                    <td>{{ (($teacher->currentpage()-1) * $teacher->perpage() + ($loop->index+1)) }}</td>
                    <td>{{ $item->firstname }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->birthdata }}</td>
                    <td>{{ $item->seriya }}</td>
                    <td>{{ $item->adress }}</td>
                    <td><a href="{{ route('aktivticher',$item->id) }}" class="btn btn-success">Aktiv qilish</a></td>

              
                </tr>
            @endforeach
        </table>
        <br>
    
        <h1>Bant Instrukto`r</h1> 
        <table class="table table-dark table-striped">
            <thead>
                <th>№</th>
                <th>Ism Familiya</th>            
                <th>Tel..</th>
                <th>Tugilgan sana</th>
                <th>Passport seriya</th>
                <th>Yashash joyi</th>
                <th>Aktiv qilish</th>
             
            </thead>
            @foreach ($construq as $item)
                <tr>
                    <td>{{ (($catigor->currentpage()-1) * $catigor->perpage() + ($loop->index+1)) }}</td>
                    <td>{{ $item->firstname }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->birthdata }}</td>
                    <td>{{ $item->seriya }}</td>
                    <td>{{ $item->adress }}</td>
                    <td><a href="{{ route('aktivinstr',$item->id) }}" class="btn btn-success">Aktiv qilish</a></td>
                            
                </tr>
            @endforeach
        </table>
       

    </div>

@endsection