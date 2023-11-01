@extends('layout.app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" />
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
            <div class="my__account--section__inner border-radius-10 d-flex">
                @include('dashboard.extends.sidebar')
                <div class="account__wrapper">
                    <div class="account__content">
                        <h3 class="account__content--title mb-20">Create Artwork</h3>
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
                                        <form class="contact__form--inner" enctype="multipart/form-data" action="{{ isset($product)? route('user.artwork.update',[$product->id]): route('user.artwork.store')}}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="contact__form--list mb-20">
                                                        <label class="contact__form--label" for="input1">Title <span
                                                                class="contact__form--label__star">*</span></label>
                                                        <input class="contact__form--input" value="{{isset($product)?$product->title:''}}" name="title" id="input1"
                                                            placeholder="Enter the title of your Artwork" type="text">
                                                            @error('title')
                                                                <label class="for-error">{{ $message }}</label>
                                                            @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="contact__form--list mb-20">
                                                        <label class="contact__form--label" for="input5">Write Your Description
                                                            <span class="contact__form--label__star">*</span></label>
                                                        <textarea class="contact__form--textarea" name="description" id="input5" placeholder="Enter your Artwork's description...It should be brief enough so that user can understand">{{isset($product)?$product->description:''}}</textarea>
                                                        @error('description')
                                                            <label class="for-error">{{ $message }}</label>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="contact__form--list mb-20">
                                                        <label class="contact__form--label" for="input5">Select the categories
                                                            <span class="contact__form--label__star">*</span></label>
                                                            <select name="category_id[]" class="form-select" id="cars" multiple>
                                                                @foreach ($categories as $category)
                                                                <option value="{{$category->id}}"
                                                                    {{ isset($product) && in_array($category->id, json_decode($product->category_id)) ? 'selected' : '' }}>
                                                                    {{$category->name}}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        @error('category_id')
                                                            <label class="for-error">{{ $message }}</label>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="contact__form--list mb-20">
                                                        <label class="contact__form--label" for="input5">Select the Artwork's Images
                                                            <span class="contact__form--label__star">*</span></label>
                                                        <input class="contact__form--input" id="dropify" type="file" name="artwork[]" multiple >
                                                        @error('artwork')
                                                            <label class="for-error">{{ $message }}</label>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    @if(isset($product))
                                                        @foreach ($product->image as $image)
                                                            <img style="width: 200px; height:100px;" src="{{asset('storage/'.$image->url)}}" alt="">
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="contact__form--list mb-20">
                                                        <label class="contact__form--label" for="input3">Enter Quantity <span
                                                                class="contact__form--label__star">*</span></label>
                                                        <input class="contact__form--input" value="{{isset($product)?$product->quantity:''}}" name="quantity" id="input3"
                                                            placeholder="Enter the quantity" type="number">
                                                        @error('quantity')
                                                            <label class="for-error">{{ $message }}</label>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="contact__form--list mb-20">
                                                        <label class="contact__form--label" for="input3">Enter Price <span
                                                                class="contact__form--label__star">*</span></label>
                                                        <input class="contact__form--input" name="price" id="input3"
                                                            placeholder="Enter the price" value="{{isset($product)?$product->price:''}}" type="text">
                                                        @error('price')
                                                            <label class="for-error">{{ $message }}</label>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="account__login--remember position__relative mb-15">
                                                <input class="checkout__checkbox--input"  name="is_active" {{ (isset($product->is_active) && $product->is_active == 1) ? 'checked' : '' }} type="checkbox">
                                                <span class="checkout__checkbox--checkmark"></span>
                                                <label class="checkout__checkbox--label login__remember--label" for="check2">
                                                    Do you want to make this artwork visible from now?</label>
                                            </div>
                                            <div class="account__login--remember position__relative mb-15">
                                                <input class="checkout__checkbox--input" name="is_featured" {{ (isset($product->is_featured) && $product->is_featured == 1) ? 'checked' : '' }} type="checkbox">
                                                <span class="checkout__checkbox--checkmark"></span>
                                                <label class="checkout__checkbox--label login__remember--label" for="check2">
                                                    Do you want to show this Artwork on Home Page?</label>
                                            </div>
                                            <button id="submitBtn" class="contact__form--btn primary__btn" type="submit">{{isset($product)? 'Update Now' : 'Submit Now'}}</button>
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
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor5/40.0.0/ckeditor.min.js" integrity="sha512-Zyl/SvrviD3rEMVNCPN+m5zV0PofJYlGHnLDzol2kM224QpmWj9p5z7hQYppmnLFhZwqif5Fugjjouuk5l1lgA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

<script>
$('#dropify').dropify();
$(document).ready(function() {
    ClassicEditor
        .create( document.querySelector( '#input5' ) )
        .catch( error => {
            console.error( error );
        } );
        
});
</script>
@endpush