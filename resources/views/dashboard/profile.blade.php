@extends('layout.app')
@section('content')
<main class="main__content_wrapper">

    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content">
                        <h1 class="breadcrumb__content--title text-white mb-10">My Account</h1>
                        <ul class="breadcrumb__content--menu d-flex">
                            <li class="breadcrumb__content--menu__items"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text-white">My Account</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- my account section start -->
    <section class="my__account--section section--padding">
        <div class="container">
            <p class="account__welcome--text">Hello, {{$user->name}} welcome to your dashboard!</p>
            <div class="my__account--section__inner border-radius-10 d-flex">
                @include('dashboard.extends.sidebar')
                <div class="account__wrapper">
                    <div class="account__content">
                        <h3 class="account__content--title mb-20">{{$user->name}}'s Profile </h3>
                        <div class="account__table--area">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="contact__form">
                                        @if (session('success'))
                                            <div class="alert alert-success alert-dismissible fade show" id="success_alert_home"role="alert">
                                                {{ session('success') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        @endif
                                        @if($user->image_url != null)
                                        <div class="text-center">
                                            <img style="border-radius: 100%; width:30%; height:50%;" src="{{asset('storage/'.$user->image->url)}}" alt="">
                                        </div>
                                        @endif
                                        <form class="contact__form--inner" action="{{route('user.update')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="contact__form--list mb-20">
                                                        <label class="contact__form--label" for="input1">Profile Image<span
                                                                class="contact__form--label__star"></span></label>
                                                        <input class="contact__form--input" name="file" id="input1"
                                                             type="file">
                                                            @error('name')
                                                                <label class="for-error">{{ $message }}</label>
                                                            @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="contact__form--list mb-20">
                                                        <label class="contact__form--label" for="input1">Name <span
                                                                class="contact__form--label__star">*</span></label>
                                                        <input class="contact__form--input" value="{{$user->name}}" name="name" id="input1"
                                                            placeholder="Your Name" type="text">
                                                            @error('name')
                                                                <label class="for-error">{{ $message }}</label>
                                                            @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="contact__form--list mb-20">
                                                        <label class="contact__form--label" for="input2">Email <span
                                                                class="contact__form--label__star">*</span></label>
                                                        <input class="contact__form--input" value="{{$user->email}}" name="email" id="input2"
                                                            placeholder="Your Email" type="text">
                                                            @error('email')
                                                                <label class="for-error">{{ $message }}</label>
                                                            @enderror
                                                    </div>
                                                </div>
                                                <h4 class="my-4">Update Passwrod</h4>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="contact__form--list mb-20">
                                                        <label class="contact__form--label" for="input3">Current Password <span
                                                                class="contact__form--label__star">*</span></label>
                                                        <input class="contact__form--input" name="current_password" id="input3"
                                                            placeholder="Enter your Current Password" type="password">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="contact__form--list mb-20">
                                                        <label class="contact__form--label" for="input4">New Password <span
                                                                class="contact__form--label__star">*</span></label>
                                                            <input class="contact__form--input" name="password" id="input3"
                                                                placeholder="Enter Your New Password" type="password">
                                                            @error('password')
                                                                <label class="for-error">{{ $message }}</label>
                                                            @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="contact__form--list mb-10">
                                                        <label class="contact__form--label" for="input5">Confirm Password
                                                            <span class="contact__form--label__star">*</span></label>
                                                        <input class="contact__form--input" name="password_confirmation" id="input3"
                                                            placeholder="Retype your New Password for Confirmation" type="password">
                                                        @error('password_confirmation')
                                                            <label class="for-error">{{ $message }}</label>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <button id="submitBtn" class="mt-5 contact__form--btn primary__btn" type="submit">Update</button>
                                            @if(session('error'))
                                            <div class="alert alert-danger">
                                                {{ session('error') }}
                                            </div>
                                            @endif
                                            <p class="form-messege"></p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- my account section end -->
</main>

@endsection