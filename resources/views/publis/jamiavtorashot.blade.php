@extends('publis.dashbord')
@section('title','Avtomobillar xarajati')
@section('control')
    <div class="container-fluid">
        <div class="row">
     
                <h1>{{ $avtohisob->avtohisob }} {{ $avtohisob->nomer }}</h1>               
                <hr>               
                <form action="{{ route('avtorasxot') }}" method="POST">
                    @csrf
                   <div class="row">                   
                        <input type="hidden" name="auto_id" value="{{ $avtohisob->id }}">               
                    <div class="form-group col-6">
                        <label for="exampleFormControlInput1" class="form-label">Sana</label>
                        <input type="date" class="form-control" placeholder="" name="data" value="{{ old('data') }}">
                        <span class="text-danger">@error('data') {{$message}}@enderror</span>
                    </div>
                    <div class="form-group col-6">
                        <label for="exampleFormControlInput1" class="form-label">Saroydan chiqish</label>
                        <input type="number" class="form-control" placeholder="" name="masofa" value="{{ old('masofa') }}">
                        <span class="text-danger">@error('masofa') {{$message}}@enderror</span>
                    </div>  

                    <div class="form-group col-6">
                        <label for="exampleFormControlInput1" class="form-label">Saroyga kirish</label>
                        <input type="number" class="form-control" placeholder="" name="finish" value="{{ old('finish') }}">
                        <span class="text-danger">@error('finish') {{$message}}@enderror</span>
                    </div>  

                    <div class="form-group col-6">
                        <label for="exampleFormControlInput1" class="form-label">Ish boshlashga koldik benzin</label>
                        <input type="number" class="form-control" placeholder="" name="benzin" value="{{ old('benzin') }}">
                        <span class="text-danger">@error('benzin') {{$message}}@enderror</span>
                    </div>

                    <div class="form-group col-6">
                        <label for="exampleFormControlInput1" class="form-label">Olindi</label>
                        <input type="number" class="form-control" placeholder="" name="solingan" value="{{ old('solingan') }}">
                        <span class="text-danger">@error('solingan') {{$message}}@enderror</span>
                    </div>

                    <div class="form-group col-6">
                        <label for="exampleFormControlInput1" class="form-label">Yurildi</label>
                        <input type="number" class="form-control" placeholder="" name="masofav" value="{{ old('masofav') }}">
                        <span class="text-danger">@error('masofav') {{$message}}@enderror</span>
                    </div>

                    <div class="form-group col-6">
                        <label for="exampleFormControlInput1" class="form-label">Sariflangan benzin</label>
                        <input type="number" class="form-control" placeholder="" name="benzinrashot" value="{{ old('benzinrashot') }}">
                        <span class="text-danger">@error('benzinrashot') {{$message}}@enderror</span>
                    </div>

                    <div class="form-group col-6">
                        <label for="exampleFormControlInput1" class="form-label">Ish oxirida qoldik benzin</label>
                        <input type="number" class="form-control" placeholder="" name="qoldiqbenzin" value="{{ old('qoldiqbenzin') }}">
                        <span class="text-danger">@error('qoldiqbenzin') {{$message}}@enderror</span>
                    </div>
                    <br>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
                    <button type="submit" class="btn btn-success">Kiritish</button>
                    </div>
                </form>
          
        </div>
    </div>
@endsection