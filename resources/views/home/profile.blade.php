<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Profile | Page</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">
  
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/library.css') }}" rel="stylesheet">
</head>
<body>

<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-md-5 memlogin">
            <div class="card">
                <div >
                      <h2 class="text-center pt-5 pb-5">Change Profile</h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{route('profile_update',$users->id)}}" enctype="multipart/form-data">
                       
                       @csrf

                        <div class="form-group">
                           

                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="nameone" required autocomplete="name" autofocus  placeholder="Your Name" value="{{$users->name}}">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                   

                       
                

                      

                     
                        <div class="form-group pt-3">
                             <input type="file" name="upload" class="form-control">
                        </div>
       
                             <div class=" form-group mt-5">
                             <input type="submit" value="Register" class="form-control " style="background-color: #212c64;color: white;">
                                    
                        
                      
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- search --}}
    
    {{-- search --}}
</div>
</body>
</html>
