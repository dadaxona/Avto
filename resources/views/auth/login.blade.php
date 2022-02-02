<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
     crossorigin="anonymous">
    <title>Custom Login</title>
    <style>
   
        .login{
            position: relative;
            left: 23%;
            top: 250px;
            background-color: rgb(50, 1, 1, 0.5);
            color: floralwhite;
            padding: 91px;
        }
        #con{
            position: absolute;
            left: 18%;
            top: 0;
        }
        .immg{
            width: 100%;
            height: 100%;
        }
    
    </style>
</head>
<body>
    <img src="{{ asset('images/a.jpg') }}" alt="tag" class="immg">
    <div class="container" id="con">
        <div class="row">
            <div class="col-6 login">
                <h1 style="text-align: center">Login</h1>
         
                <form action="{{route('login-user')}}" method="POST" style="text-align: center">
                    @csrf
                    @if (Session::has('fail'))
                    <div class="alert alert-danger">
                        {{Session::get('fail')}}
                    </div>
                @endif
                    @if(Session::has('fail2'))
                    <div class="alert alert-danger">
                        {{Session::get('fail2')}}
                    </div>
                @endif
                    @if(Session::has('not'))
                    <div class="alert alert-danger">
                        {{Session::get('not')}}
                    </div>
                @endif
                <div class="form-group">
                    <select name="login" id="" class="form-control">
                        <option value="glovni">Drektor</option>
                        <option value="bugalter">Bugalter</option>
                        <option value="admin">Operatordmin</option>
                    </select>
                    <span class="text-danger">@error('login') {{$message}}@enderror</span>
                </div>
                <br>
                <div class="form-group">
                
                    <input type="password" class="form-control" placeholder="Password" name="password"  value="{{old('password')}}">
                    <span class="text-danger">@error('password') {{$message}}@enderror</span>
                </div>
                    <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"></path>
                            <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"></path>
                            </svg>
                        Kirish
                    </button>
                </div>               
                </form>
            </div>
        </div>

    </div>
    
</body>
</html>