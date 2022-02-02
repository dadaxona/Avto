<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
     crossorigin="anonymous">
     

    <title>Verfiy</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offiset-4">
                <h1 style="color: rgb(7, 189, 7)">Email Verifiqation cods</h1>
                <hr>
                <form action="{{ route('registr-user') }}" method="post">
                 
                    @if (Session::has('fail'))
                        <div class="alert alert-danger">
                            {{Session::get('fail')}}
                        </div>
                    @endif
                    @csrf
                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
        
                    <div class="form-group">
                  
                        <input type="hidden" class="form-control" placeholder="Nmae" name="name" value="{{ $user->name }}">
                      
                    </div>
                    <div class="form-group">
                   
                        <input type="hidden" class="form-control" placeholder="Emaile" name="email" value="{{ $user->email }}">
                      
                    </div>
                    <div class="form-group">
                        
                        <input type="hidden" class="form-control" placeholder="Password" name="password" value="{{ $user->password }}">
                      
                    </div>
                    <div class="form-group">
                       
                        <input type="hidden" class="form-control" name="code" value="{{ $user->code }}">

                    </div>
                    <div class="form-group">
                        <label for="name"><h4>Verfication Code</h4></label>
                        <input type="number" class="form-control" placeholder="Vefication Code" name="code_confirmation" value="{{ old('code_confirmation') }}">
                        <span class="text-danger">@error('code_confirmation') {{$message}}@enderror</span>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Save</button>    
                   
        
                </form>
                <br>
                <form action="{{ route('verfy') }}" method="post">
                    @csrf        
                    <div class="form-group">
                  
                        <input type="hidden" class="form-control" placeholder="Nmae" name="name" value="{{ $user->name }}">
                      
                    </div>
                    <div class="form-group">
                   
                        <input type="hidden" class="form-control" placeholder="Emaile" name="email" value="{{ $user->email }}">
                      
                    </div>
                    <div class="form-group">
                        
                        <input type="hidden" class="form-control" placeholder="Password" name="password" value="{{ $user->password }}">
                      
                    </div>
     
                    <br>
                    <button type="submit" class="btn btn-info">Qaytadan parol jonatish</button>    
                   
        
                </form>
            </div>
        </div>

    </div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
 crossorigin="anonymous"></script>
</html>