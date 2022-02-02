@extends('publis.dashbord')
@section('title','O`chgan o`quvchilarni tiklash')
@section('control')
<div class="container-fluid">
    <div class="row pt-2">  

        <h2>Parolni o`zgartirish</h2>     
     
        <form action="{{ route('bugalterparol') }}" method="POST" class="d-flex">   
            @csrf       
            <div class="col-2 me-4">
                <input class="form-control" type="password" name="password" placeholder="Parolingizni tanlang" value="{{ old('password') }}">
                <span class="text-danger">@error('password') {{$message}}@enderror</span>  
            </div>
            <div class="col-2 me-4">
                <input class="form-control" type="password" name="passwordconfirm"placeholder="Parolingizni qaytadan kiriting" {{ old('passwordconfirm') }}>
                <span class="text-danger">@error('passwordconfirm') {{$message}}@enderror</span>  
            </div>
            <div class="col-2 me-4">
                <button class="btn btn-success" type="submit">
                        Yangilash         
                    </button>
            </div>
        </form>   
     
                     
        </div>     
    </div>
@endsection