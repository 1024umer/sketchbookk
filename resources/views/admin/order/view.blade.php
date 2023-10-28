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
                            <a href=""
                                class="btn-success btn-sm btn mb-2 cursor-pointer">
                                <i class=" icon-add"></i>
                                Add New
                            </a>
                        </div>
                    </div>
                    <form method="post" >
                        @csrf
                        <table id="" class="table table-bordered table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th >Order</th>
                                    <th >Date</th>
                                    <th >Payment Status</th>
                                    <th >Fulfillment Status</th>
                                    <th >Total</th>
                                    <th >Action</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @foreach ($orders as $order)                                        
                                    <tr class="account__table--body__child">
                                        <td >{{$order->order_id}}</td>
                                        <td >{{$order->created_at->format('d-Y-M')}}</td>
                                        <td >{{$order->stripe_status}}</td>
                                        <td >{{$order->order_status}}</td>
                                        <td >${{$order->product->price}}</td>
                                        <td>
                                            <a href="{{route('admin.order.view',[$order->order_id])}}" class="btn btn-outline-primary">View</a>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>

                        {{-- <button type="submit" class="btn btn-sm mb-2 btn-success">
                            Update sequence
                        </button> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
