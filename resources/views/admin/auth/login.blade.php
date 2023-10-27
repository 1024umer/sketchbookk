<link rel="stylesheet" href="{{asset('admin/css/app.css')}}">
<main>
    <div id="primary" class="p-t-b-100 height-full ">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mx-md-auto">
                    <div class="text-center">
                        <img src="{{ asset('admin/img/vps_logo.png') }}" alt="">
                        <h3 class="mt-2"></h3>
                        <p class="p-t-b-20"></p>
                    </div>
                    <form method="POST" action="{{route('authenticate')}}">
                        @csrf
                        <div class="form-group has-icon"><i class="icon-envelope-o"></i>
                            <input type="email" name="email" class="form-control form-control-lg" placeholder="Email Address">
                            @error('email')
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group has-icon"><i class="icon-user-secret"></i>
                            <input type="password" name="password" class="form-control form-control-lg" placeholder="Password">
                            @error('password')
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group has-icon">
                            @error('invalid_credentials')
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-success btn-lg btn-block" value="Log In">
                        
                        {{-- <a href="{{route('signup')}}" class="btn btn-info btn-lg btn-block">Sign Up </a> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #primary -->
</main>