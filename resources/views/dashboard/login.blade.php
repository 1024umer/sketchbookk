@extends('layout.app')
@section('content')
<main class="main__content_wrapper">

    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content">
                        <h1 class="breadcrumb__content--title text-white mb-10">Account Page</h1>
                        <ul class="breadcrumb__content--menu d-flex">
                            <li class="breadcrumb__content--menu__items"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text-white">Account Page</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- Start login section  -->
    <div class="login__section section--padding">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" id="success_alert_home"role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="container">
            <div class="login__section--inner">
                <div class="row row-cols-md-2 row-cols-1">
                    <div class="col">
                        <div class="account__login">
                            <div class="account__login--header mb-25">
                                <h3 class="account__login--header__title mb-10">Login</h3>
                                <p class="account__login--header__desc">Login if you area a returning customer.</p>
                            </div>
                            <div class="account__login--inner">
                                        <form action="{{route('authenticate')}}" method="post">
                                            @csrf
                                        <label>
                                            <input class="account__login--input" name="email" placeholder="Email Addres" type="email">
                                            @error('invalid_credentials')
                                            <label class="for-error">{{ $errors->first('invalid_credentials') }}</label>
                                            @enderror
                                        </label>
                                        <label>
                                            <input class="account__login--input" name="password" placeholder="Password" type="password">
                                            @error('email')
                                            <label class="for-error">{{ $errors->first('invalid_credentials') }}</label>
                                            @enderror
                                        </label>
                                        <div class="account__login--remember__forgot mb-15 d-flex justify-content-between align-items-center">
                                            <div class="account__login--remember position__relative">
                                                <input class="checkout__checkbox--input" id="check1" type="checkbox">
                                                <span class="checkout__checkbox--checkmark"></span>
                                                <label class="checkout__checkbox--label login__remember--label" for="check1">
                                                    Remember me</label>
                                            </div>
                                            <button class="account__login--forgot"><a href="{{route('auth.forgetPassword')}}">Forgot Your Password?</a></button>
                                        </div>
                                        <button class="account__login--btn primary__btn" type="submit">Login</button>
                                    </form>
                                        <div class="account__login--divide">
                                            <span class="account__login--divide__text">OR</span>
                                        </div>
                                        <div class="account__social d-flex justify-content-center mb-15">
                                            <a class="account__social--link facebook" target="_blank" href="https://www.facebook.com">Facebook</a>
                                            <a class="account__social--link google" target="_blank" href="https://www.google.com">Google</a>
                                            <a class="account__social--link twitter" target="_blank" href="https://twitter.com">Twitter</a>
                                        </div>
                                        <p class="account__login--signup__text">Don,t Have an Account? <button type="submit">Sign up now</button></p>
                                    </div>
                                </div>
                        </div>
                        <div class="col">
                            <div class="account__login register">
                                <div class="account__login--header mb-25">
                                    <h3 class="account__login--header__title mb-10">Create an Account</h3>
                                    <p class="account__login--header__desc">Register here if you are a new customer</p>
                                </div>
                                <div class="account__login--inner">
                                        <form action="{{route('signup')}}"  name="signup" method="post">
                                                @csrf
                                        <label>
                                            <input class="account__login--input" name="name" placeholder="Username" type="text">
                                            @error('name')
                                                <label class="for-error">{{ $message }}</label>
                                            @enderror
                                        </label>
                                        <label>
                                            <input class="account__login--input" name="email" placeholder="Email Addres" type="email">
                                            @error('email')
                                                <label class="for-error">{{ $message }}</label>
                                            @enderror
                                        </label>
                                        <label>
                                            <input class="account__login--input" name="password" placeholder="Password" type="password">
                                            @error('password')
                                                <label class="for-error">{{ $message }}</label>
                                            @enderror
                                        </label>
                                        <label>
                                            <input class="account__login--input" name="password_confirmation" placeholder="Confirm Password" type="password">
                                            @error('password_confirmation')
                                                <label class="for-error">{{ $message }}</label>
                                            @enderror
                                        </label>
                                        <label>
                                            <button class="account__login--btn primary__btn mb-10" type="submit">Submit & Register</button>
                                        </label>
                                        <div class="account__login--remember position__relative">
                                            <input class="checkout__checkbox--input" name="artist" type="checkbox">
                                            <span class="checkout__checkbox--checkmark"></span>
                                            <label class="checkout__checkbox--label login__remember--label" for="check2">
                                                Create Account as an Artist?</label>
                                        </div>
                                        <div class="account__login--remember position__relative">
                                            <input class="" id="check2" type="checkbox">
                                            <span class="checkout__checkbox--checkmark"></span>
                                            <label class="checkout__checkbox--label login__remember--label" for="check2">
                                                I have read and agree to the terms & conditions</label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- End login section  -->
</main>

@endsection