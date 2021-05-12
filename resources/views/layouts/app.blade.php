<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

   
      
   

    
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  
    <link rel="stylesheet" type="text/css" href="{{asset('font-awesome-4.7.0/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('css/library.css') }}">
  
</head>
<body>
    <div id="app">




        {{-- start nav --}}
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm  mycontainer">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                   <h1 class="background"> <img src="{{asset('/image/logo.png')}}" alt="" class="logo-image" style="width: 80px; height: 80px; margin-right:20px;">Library Management System
                   </h1>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                           @if(!isset(Auth::user()->image))
                        <a href="{{route('profile_edit',Auth::user()->id)}}"><img src="{{asset('image/user.jpg')}}" style="width: 70px; height:70px; border-radius: 50%;"></a>
                       @else
                        <a href="{{route('profile_edit',Auth::user()->id)}}"><img src="{{asset('/storage/upload/'. Auth::user()->image)}}" style="width: 70px; height: 70px; border-radius: 50px;"></a>
                      @endif
                        
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            
                            @else

                 



                       
                       

                            <li class="nav-item dropdown mt-3">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                                style="color: #ffffff">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                     <a class="dropdown-item" href="{{route('profile_edit',Auth::id())}}">
                                   Profile
                                    </a>



                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                               @if (Route::has('register'))
                                <li class="nav-item mt-3" >
                                    <a class="nav-link" href="{{ route('register') }}" style="color: #ffffff">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @endguest

                    </ul>
                </div>
            </div>
          
        </nav>
        {{-- end nav --}}
{{-- container-fluid --}}
<div class="container-fluid pt-5 pb-5">
{{-- start row --}}
<div class="row">
    {{-- start col-md-9 --}}
    <div class="col-md-9 ">
    <div class="card-deck">
            {{-- card --}}
         <a href="{{route('index')}}">
    <div class="card float-left mr-5 "  >
        {{-- card-body --}}
        <div class="card-body text-center">
          <p class="image">  
            <img src="{{asset('image/home.jpeg')}}" ></p>
     
            <p style="margin: 0px 33px;">Home</p>
        </div>

        {{-- end card-body --}}
    </div>
    {{-- end card --}}
</a>

    {{-- card --}}
     <a href="{{route('borrower_index')}}" >
    <div class="card  float-left mr-5" >
        {{-- card-body --}}
        <div class="card-body text-center">
          <p class="image">  
            <img src="{{asset('image/user.webp')}}" ></p>
     
           <p style="margin: 0px 20px;">Borrowers</p>
        </div>

        {{-- end card-body --}}
    </div>
    {{-- end card --}}
</a>

    
    {{-- card --}}
<a  href="{{route('dep_index')}}">
    <div class="card  float-left mr-5" >
        {{-- card-body --}}
        <div class="card-body text-center">
          <p class="image">  
            <img src="{{asset('image/department.png')}}" ></p>
     
            {{-- start department --}}
    <div >
  
    <p style="margin: 0px 14px;">Department</p>
 
  {{-- end department --}}
  
  </div>




        </div>

        {{-- end card-body --}}
    </div>
    {{-- end card --}}
     </a>

    {{-- card --}}
      <a  href="{{route('category')}}">

    <div class="card  float-left mr-5" >
        {{-- card-body --}}
        <div class="card-body text-center">
          <p class="image">  
            <img src="{{asset('image/book.png')}}" ></p>
         {{-- start dropdown toggle --}}
         <div >
    <p style="margin: 0px 9px;">Types of Book</p>
 
  
</div>

{{-- end dropdown toggle  --}}
        </div>

        {{-- end card-body --}}
    </div>
    {{-- end card --}}
 </a>
    
    

      {{-- card --}}
        <a href="{{route('book_index')}}" >
    <div class="card " >
        {{-- card-body --}}
        <div class="card-body text-center">
          <p class="image">  
            <img src="{{asset('image/total.png')}}" >

          </p>
     
          <p style="margin: 0px 16px;">Total Books</p>

        </div>

        {{-- end card-body --}}
    </div>
    {{-- end card --}}
</a>
    </div>
    </div>
    {{-- end col-md-9 --}}


</div>
{{-- end row --}}
</div>
{{-- end container-fluid --}}
        <main class="py-4">
            
            @yield('content')
        </main>
    </div>
 <!-- Scripts -->
 
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- <script  src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{asset('js/library.js')}}">
   
</script>
</body>
</html>

