<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Library Management System</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{ asset('css/library.css') }}">
        <link rel="stylesheet" href="{{asset('font-awesome-4.7.0/css/font-asesome.css')}}">

       
    </head>
    <body>
        {{-- <div class="container">
            <div class="content pt-5">
                <div class="title m-b-md" style="font-family: Segoe Print;">
                    Welcome to Library Management System
                </div>

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="text-center links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">
                           
                        <img src="{{asset('image/login.png')}}" style="width: 150px; height: 130px;"></a>

                        @if (Route::has('register'))

                            <a href="{{ route('register') }}"><img src="{{asset('image/register.png')}}" style="width: 150px; height:100px;"></a>
                        @endif
                    @endauth
                </div>
            @endif

            
               
            </div>
        </div>
        </div> --}}


{{-- div.container-fluid --}}
        <div class=" container-fluid front-image"  style="background-image: url('/image/book.jpg');  background-repeat: none; background-size: cover;">
               <h1>Welcome To Our Library Management System</h1>
              <div class="container welcome">
                  

                  {{-- login and register --}}

        <div class="flex-center position-ref">
            @if (Route::has('login'))
                <div class="text-center links">
                    @auth
                        <a href="{{ url('/home') }}"></a>
                    @else
                    <a href="{{ route('login') }}">
                        <div class="login">
                            
                       
                       <h5>Login</h5>
                        </div>
                        </a>
                       

                       {{--  @if (Route::has('register'))

                        
                                <a href="{{ route('register') }}">
                             <div class="register">
                             <h5>Register</h5>
                             </div>
                        </a>
                           
                        @endif --}}
                    @endauth
                    @endif
                </div>
                  {{-- end login and register --}}
              </div>        
        </div>
    {{-- end container-fluid --}}
    </body>
</html>
