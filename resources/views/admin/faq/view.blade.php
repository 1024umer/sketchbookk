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
                            <a href="{{route('admin.faq.add')}}" class="btn-success btn-sm btn mb-2 cursor-pointer">
                                <i class=" icon-add"></i>
                                Add New
                            </a>
                        </div>
                    </div>
                    <form method="post" action=" ">
                        @csrf
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" id="success_alert_home"role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <table id="" class="table table-bordered table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th width=" 10px">#</th>
                                    <th class="">Title</th>
                                    <th width="150px">Action</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @foreach ($faqs as $faq)    
                                    <tr>
                                        <td></td>
                                        <td>{{$faq->title}}</td>
                                        <td>
                                            <a class="btn-primary btn-sm btn cursor-pointer"
                                                href="{{route('admin.faq.edit',[$faq->id])}}"> <i
                                                    class="icon-edit"></i> </a>
                                                    <a class="btn-danger btn-sm btn cursor-pointer"
                                                href="{{route('admin.faq.delete',[$faq->id])}}"> <i
                                                    class="icon-delete"></i> </a>
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
