@extends('layout.app')
@section('content')

<div class="container">
            <div class="login__section--inner">
                <div class="row row-cols-md-2 row-cols-1">
                    <div class="col">
                        <div class="account__login">
                            <div class="account__login--header mb-25">
                                <h3 class="account__login--header__title mb-10">Forget Password</h3>
                                <p class="account__login--header__desc">Enter email where we should send the link</p>
                            </div>
                            <div class="account__login--inner">
                                        <form action="{{ route('auth.forgetPassword.reset') }}" method="POST">
                                            @csrf
                                        <label>
                                            <input class="account__login--input @error('email') has-error @enderror" value="{{ old('email') }}" required name="email" placeholder="Email Addres" type="email">
                                            @error('email')
                                        <label class="for-error">{{ $message }}</label>
                                    @enderror
                                        </label>
                                        <div class="account__login--remember__forgot mb-15 d-flex justify-content-between align-items-center">
                                            <div class="account__login--remember position__relative">
                                                <input class="checkout__checkbox--input" id="check1" type="checkbox">
                                                <span class="checkout__checkbox--checkmark"></span>
                                                <label class="checkout__checkbox--label login__remember--label" for="check1">
                                                    Remember me</label>
                                            </div>
                                        </div>
                                        <button class="account__login--btn primary__btn" type="submit">Send Email</button>
                                    </form>
                                        <p class="account__login--signup__text">Remember your Password? <button type="submit"><a href="{{route('login')}}">Login now</a></button></p>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
        </div>

@endsection