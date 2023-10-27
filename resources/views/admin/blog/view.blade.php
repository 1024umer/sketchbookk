@extends('layouts.admin.app')
@section('page_header')
@endsection
@section('content')
    <div class="container my-3">
        <div class="card p-3">
            <div class="row">
                <div class="col-md-12">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" id="success_alert_home"role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="box-header with-border">
                        <div class="d-flex justify-content-start">
                            <a href="{{route('admin.blog.add')}}" class="btn-success btn-sm btn mb-2 cursor-pointer">
                                <i class=" icon-add"></i>
                                Add New
                            </a>
                        </div>
                    </div>
                    <form>
                        @csrf
                        <table id="" class="table table-bordered table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th width=" 10px">#</th>
                                    <th class="">Title</th>
                                    <th width="150px">Status</th>
                                    <th width="150px">Featured</th>
                                    <th width="150px">Action</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @foreach ($blogs as $blog)                                    
                                    <tr>
                                        <td>{{$blog->id}}</td>
                                        <td>{{Str::limit($blog->title,100)}}</td>
                                        <td>
                                                <span class="badge p-2 badge-{{$blog->is_active==1?'success':'danger'}}">{{$blog->is_active==1?'Avtive':'Not Active'}}</span>
                                        </td>
                                        <td>
                                            <span class="badge p-2 badge-{{$blog->is_featured==1?'success':'danger'}}">{{$blog->is_featured==1?'Featured':'Not Featured'}}</span>
                                        </td>
                                        <td>
                                            <a class="btn-primary btn-sm btn cursor-pointer"
                                                href="{{route('admin.blog.edit',[$blog->id])}}"> <i
                                                    class="icon-edit"></i> </a>
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
