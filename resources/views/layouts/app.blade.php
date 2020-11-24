<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/library.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">
  
</head>
<body>
    <div id="app">




        {{-- start nav --}}
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm  mycontainer">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   <h1>Library Management System
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
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        @if(!isset($users->image))
                        <a href="#"><img src="{{asset('image/user.jpg')}}" style="width: 70px; height: 70px; border-radius: 50%;"></a>
                        @else
                        <a href="#"><img src="{{asset('/storage/upload/'.$users->image)}}"style="width: 70px; height: 70px; border-radius: 50%;"></a>
                        @endif

                            <li class="nav-item dropdown mt-3">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
          
        </nav>
        {{-- end nav --}}
{{-- container-fluid --}}
<div class="container-fluid pt-5 pb-5">
 {{-- card --}}
    <div class="card  mycard float-left mr-5" >
        {{-- card-body --}}
        <div class="card-body text-center">
          <p class="image">  
            <img src="{{asset('image/home.jpeg')}}" ></p>
     
            <a href="{{route('index')}}" style="color: #000000">Home </a>
        </div>

        {{-- end card-body --}}
    </div>
    {{-- end card --}}

    {{-- card --}}
    <div class="card  mycard float-left mr-5" >
        {{-- card-body --}}
        <div class="card-body text-center">
          <p class="image">  
            <img src="{{asset('image/book.png')}}" ></p>
         {{-- start dropdown toggle --}}
         <div >
  <a  class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Book Lists
  </a>
  {{-- start dropdown-menu --}}
  <div class="dropdown-menu">
    <h5 class="text-center">Types of book:</h5>

{{-- row --}}
<div class="row">
    {{-- col --}}
    @foreach($categories as $key=>$category)
    <div class="col-md-6">
        <a href="#" class="dropdown-item">{{$category->name}}</a>
    </div>
    {{-- end col --}}
    @endforeach 
</div>
{{-- end row --}}

     <div>
         <a href="{{route('category')}}" class="btn btn-info ml-2 mt-4">Create</a>
     </div>
  </div>
  {{-- end dropdown-menu --}}
</div>

{{-- end dropdown toggle  --}}
        </div>

        {{-- end card-body --}}
    </div>
    {{-- end card --}}

    {{-- card --}}
    <div class="card  mycard  float-left mr-5" >
        {{-- card-body --}}
        <div class="card-body text-center">
          <p class="image">  
            <img src="{{asset('image/user.webp')}}" ></p>
     
            <a href="#" style="color: #000000">Borrowers</a>
        </div>

        {{-- end card-body --}}
    </div>
    {{-- end card --}}

    {{-- card --}}
    <div class="card  mycard  " >
        {{-- card-body --}}
        <div class="card-body text-center">
          <p class="image">  
            <img src="{{asset('image/depart.jpg')}}" ></p>
     
            {{-- start dropdown toggle --}}
         <div >
  <a  class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Department
  </a>
  {{-- start dropdown-menu --}}
  <div class="dropdown-menu">
@foreach($departments as $department)
   <a href="#" class="dropdown-item">{{$department->name}}</a>
@endforeach
     

         <a href="{{route('dep_index')}}" class="btn btn-info ml-2 mt-4">Create</a>
     </div>
  </div>
  {{-- end dropdown-menu --}}
</div>



        </div>

        {{-- end card-body --}}
    </div>
    {{-- end card --}}
</div>
{{-- end container-fluid --}}
        <main class="py-4">
            
            @yield('content')
        </main>
    </div>
</body>
</html>

