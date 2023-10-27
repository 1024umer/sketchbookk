@extends('layout.app')
@section('content')

<div class="container">
            <div class="login__section--inner">
                <div class="row row-cols-md-2 row-cols-1">
                    <div class="col">
                        <div class="account__login">
                            <div class="account__login--header mb-25">
                                <h3 class="account__login--header__title mb-10">Update Password</h3>
                                <p class="account__login--header__desc">Enter your new password to update</p>
                            </div>
                            <div class="account__login--inner">
                                        <form action="{{ route('password.update') }}" method="POST">
                                            @csrf
                                        <label>
                                            <input type="email" class="account__login--input"
                                                value="{{ old('email', isset($_GET['email']) ? $_GET['email'] : '') }}" required
                                                name="email" class="form-control form-control fp" id="exampleFormControlInput1"
                                                placeholder="Email" />
                                                <input type="hidden" name="token" value="{{ $token }}" />
                                            @error('email')
                                                <label class="for-error">{{ $message }}</label>
                                            @enderror
                                        </label>
                                        <label>
                                            <input class="account__login--input" required name="password" placeholder="Password" type="password">
                                            @error('password')
                                                <label class="for-error">{{ $message }}</label>
                                            @enderror
                                        </label>
                                        <label>
                                            <input class="account__login--input" required name="password_confirmation" placeholder="Password" type="password">
                                            @error('password_confirmation')
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
                                        <button class="account__login--btn primary__btn" type="submit">Update</button>
                                    </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
        </div>

@endsection