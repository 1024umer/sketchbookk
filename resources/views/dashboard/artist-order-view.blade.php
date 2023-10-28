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
            <p class="account__welcome--text">Hello, {{auth()->user()->name}} welcome to your dashboard!</p>
            <div class="my__account--section__inner border-radius-10 d-flex">
                @include('dashboard.extends.sidebar')
                <div class="account__wrapper">
                    <div class="account__content">
                        <h3 class="account__content--title mb-20">Orders History</h3>
                        <div class="account__table--area">
                            <label for="">Product Image</label>
                            <img src="{{asset('storage/'.$order->product->imageOne->url)}}" alt="">
                            <br>
                            <p>Order ID : {{$order->order_id}}</p>
                            <p>Artist: {{$order->user->name}}</p>
                            <p>Product Title: {{$order->product->title}}</p>
                            <p>Order Price: {{$order->product->price}}</p>
                            <p>Buyer Name: {{$order->first_name}} {{$order->last_name}}</p>
                            <p>Buyer Email: {{$order->email}}</p>
                            <p>Buyer Address: {{$order->address}}</p>
                            <p>Buyer City: {{$order->city}}</p>
                            <p>Buyer State: {{$order->state}}</p>
                            <p>Buyer Note: {{$order->notes}}</p>
                            <p>Payment Status: {{$order->stripe_status}}</p>
                            <form action="{{route('user.order.update',[$order->order_id])}}" method="POST">
                                @csrf
                                <select required name="order_status" class="form-select" aria-label="Default select example">
                                    <option selected>Change Order Status</option>
                                    <option value="1">Pending</option>
                                    <option value="2">In Progress</option>
                                    <option value="3">In route</option>
                                    <option value="4">Delivered</option>
                                </select>
                                <button type="submit" class="btn btn-success">Update Status</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- my account section end -->
</main>

@endsection