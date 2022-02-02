
@extends('admin.dashbordadmin')
@section('title','Guruhni yangilash')
@section('controlad')

    <div class="row">
    <form action="{{ route('storeupdateadmine',$col->id) }}" method="POST">
        @csrf
        <div class="row"> 
       
                <input type="hidden" name="id"  value="{{$col->id}}">
                <input type="hidden" name="number"  value="{{$col->number}}">
                             
  
        <div class="col-6 pt-2">
            <label for="exampleInputEmail1" class="form-label mt-4">Guruh Katigo'riyai</label>
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
        <div class="col-6 pt-2">
            <label for="exampleInputEmail1" class="form-label mt-4">Guruh Summasi</label>
            <input type="text" class="form-control" placeholder="Kurs Narxi" name="summa"  value="{{$col->summa}}">
            <span class="text-danger">@error('summa') {{$message}}@enderror</span>
        </div>

        <div class="col-12 pt-2">
            <label for="exampleInputEmail1" class="form-label mt-4">Guruh o`qituvchisini tanlang</label>
            <select name="oqtuvci" class="form-control" style="color: #6c757d;">
                <option value="" >Masul O'qituvchi</option>
                @foreach ($collection as $item)
                    <option value="{{ $item->id }}">{{ $item->lastname }} {{ $item->firstname }}</option>
                @endforeach
            </select>
            <span class="text-danger">@error('oqtuvci') {{$message}}@enderror</span>
        </div>

        <div class="col-6 pt-2">
            <label for="exampleInputEmail1" class="form-label mt-4">Guruh Instrukto`rni tanlang</label>
            <select name="qonstruq" class="form-control" style="color: #6c757d;">
                <option value="">Instruqto'r</option>
                @foreach ($cons as $item)
                    <option value="{{ $item->id }}">{{ $item->lastname }} {{ $item->firstname }}</option>
                @endforeach
            </select>
            <span class="text-danger">@error('qonstruq') {{$message}}@enderror</span>
        </div>

        <div class="col-6 pt-2">
            <label for="exampleInputEmail1" class="form-label mt-4">Guruhga Avtomabil tanlang</label>

            <select name="mashina" class="form-control" style="color: #6c757d;">
            <option value="">Avtomabilni`rni tanlang</option>
                @foreach ($auto as $item)
                    <option value="{{ $item->mashina }}">{{ $item->mashina }} {{ $item->nomer }}</option>
                @endforeach
            </select>
            <span class="text-danger">@error('mashina') {{$message}}@enderror</span>
        </div>

        <div class="col-6 pt-2">
            <label for="exampleInputEmail1" class="form-label mt-4">Qoshimcha Instrukto`rni tanlang</label>

            <select name="qonstruq2" class="form-control" style="color: #6c757d;">
                <option value="">Instruqto'r</option>
                @foreach ($cons as $item)
                    <option value="{{ $item->id }}">{{ $item->lastname }} {{ $item->firstname }}</option>
                @endforeach
            </select>
            <span class="text-danger">@error('qonstruq2') {{$message}}@enderror</span>
        </div>

        <div class="col-6 pt-2">
            <label for="exampleInputEmail1" class="form-label mt-4">Qoshimcha Avtomabil tanlang</label>

            <select name="mashina2" class="form-control" style="color: #6c757d;">
            <option value="">Avtomabilni`rni tanlang</option>
                @foreach ($auto as $item)
                    <option value="{{ $item->mashina }}">{{ $item->mashina }} {{ $item->nomer }}</option>
                @endforeach
            </select>
            <span class="text-danger">@error('mashina2') {{$message}}@enderror</span>
        </div>

        <div class="col-6 pt-2">
            <label for="exampleInputEmail1" class="form-label mt-4">Qoshimcha Instrukto`rni tanlang</label>
            <select name="qonstruq3" class="form-control" style="color: #6c757d;">
                <option value="">Instruqto'r</option>
                @foreach ($cons as $item)
                    <option value="{{ $item->id }}">{{ $item->lastname }} {{ $item->firstname }}</option>
                @endforeach
            </select>
            <span class="text-danger">@error('qonstruq3') {{$message}}@enderror</span>
        </div>
        <div class="col-6 pt-2">
            <label for="exampleInputEmail1" class="form-label mt-4">Qoshimcha Avtomabil tanlang</label>
            <select name="mashina3" class="form-control" style="color: #6c757d;">
            <option value="">Avtomabilni`rni tanlang</option>
                @foreach ($auto as $item)
                    <option value="{{ $item->mashina }}">{{ $item->mashina }} {{ $item->nomer }}</option>
                @endforeach
            </select>
            <span class="text-danger">@error('mashina3') {{$message}}@enderror</span>
        </div>

        <input type="hidden" name="status" value="1">
        <div class="col-6 pt-2">
            <label for="exampleInputEmail1" class="form-label mt-4">Guruhning boshlanish vaqti</label>
                <input type="date" class="form-control" placeholder="Guruh tugash muddati" name="data"  value="{{ $col->data }}">
                <span class="text-danger">@error('data') {{$message}}@enderror</span>     
        </div>

        <div class="col-6 pt-2">
            <label for="exampleInputEmail1" class="form-label mt-4">Guruhning tugash vaqti</label>
            <input type="date" class="form-control" placeholder="Guruh tugash muddati" name="data2"  value="{{ $col->data2 }}">
            <span class="text-danger">@error('data2') {{$message}}@enderror</span>     
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
            <button class="btn btn-primary me-md-2" type="submit">Kiritish</button>
          </div>           
    </div>
</form>
</div>
@endsection