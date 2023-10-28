@extends('layouts.admin.app')
@section('page_header')
@endsection
@section('content')
    <div class="container my-3">
        <div class="card p-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-header with-border">
                        <div class="d-flex justify-content-start">
                            
                        </div>
                    </div>
                    <form method="post" >
                        @csrf
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
                            <p>Order Status: {{$order->order_status}}</p>

                        {{-- <button type="submit" class="btn btn-sm mb-2 btn-success">
                            Update sequence
                        </button> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
