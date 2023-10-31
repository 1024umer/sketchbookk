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
            <div class="my__account--section__inner border-radius-10 d-flex">
                @include('dashboard.extends.sidebar')
                <div class="account__wrapper">
                    <div class="account__content">
                        <div class="row">
                            <div class="col-lg-9 col-md-9 col-sm-6">
                                <h3 class="account__content--title mb-20">My Art Work</h3>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <a href="{{route('user.artwork.add')}}" class="contact__form--btn primary__btn">Add Artwork &rarr;</a>
                            </div>
                        </div>
                        <div class="account__table--area">
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" id="success_alert_home"role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            <table class="account__table">
                                <thead class="account__table--header">
                                    <tr class="account__table--header__child">
                                        <th class="account__table--header__child--items">#</th>
                                        <th class="account__table--header__child--items">Title</th>
                                        <th class="account__table--header__child--items">Price</th>
                                        <th class="account__table--header__child--items">Quantity</th>
                                        <th class="account__table--header__child--items">Status</th>
                                        <th class="account__table--header__child--items">Featured</th>
                                        <th class="account__table--header__child--items">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="account__table--body mobile__none">
                                    @foreach ($products as $product)    
                                        <tr class="account__table--body__child">
                                            <td class="account__table--body__child--items">{{$product->id}}</td>
                                            <td class="account__table--body__child--items">{{Str::limit($product->title,100)}}</td>
                                            <td class="account__table--body__child--items">{{$product->price}}</td>
                                            <td class="account__table--body__child--items">{{$product->quantity}}</td>
                                            <td class="account__table--body__child--items {{$product->is_approved == 1 ? 'green' : 'red'}}">{{$product->is_active == 1 ? 'Active' : 'Not Active'}}</td>
                                            <td class="account__table--body__child--items {{$product->is_featured == 1 ? 'green' : 'red'}}">{{$product->is_featured == 1 ? 'YES' : 'NO'}}</td>
                                            <td class="account__table--body__child--items"><a href="{{route('user.artwork.edit',[$product->id])}}"><i class="fa-solid fa-pen-to-square"></i></a> | <a href="{{route('user.artwork.delete',[$product->id])}}"><i class="fa-solid fa-trash"></i></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tbody class="account__table--body mobile__block">
                                    @foreach ($products as $product)  
                                        <tr class="account__table--body__child">
                                            <td class="account__table--body__child--items">
                                                <strong>Ttile</strong>
                                                <span>{{Str::limit($product->title,100)}}</span>
                                            </td>
                                            <td class="account__table--body__child--items">
                                                <strong>Price</strong>
                                                <span>{{$product->price}}</span>
                                            </td>
                                            <td class="account__table--body__child--items">
                                                <strong>Quantity</strong>
                                                <span>{{$product->quantity}}</span>
                                            </td>
                                            <td class="account__table--body__child--items">
                                                <strong>Price</strong>
                                                <span>{{$product->is_active == 1 ? 'Active' : 'Not Active'}}</span>
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- my account section end -->
</main>

@endsection