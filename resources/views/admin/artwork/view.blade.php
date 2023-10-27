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
                                    <th width=" 10px">#</th>
                                    <th class="">Artist</th>
                                    <th class="">Amount</th>
                                    <th class="">Title</th>
                                    <th width="150px">Status</th>
                                    <th width="150px">Action</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @foreach ($artworks as $artwork)                                    
                                    <tr>
                                        <td>
                                            <input type="hidden" name="sequence" value="">
                                        </td>
                                        <td>{{$artwork->user->name}} </td>
                                        <td>${{$artwork->price}} </td>
                                        <td>{{Str::limit($artwork->title,50)}}</td>
                                        <td>
                                            <span class="badge p-2 badge-{{$artwork->is_approved == 0?'danger':'success'}}">{{$artwork->is_approved == 0?'Not Approved':'Approved'}}</span>
                                        </td>
                                        <td>
                                            @if ($artwork->is_approved == 0)
                                            <a class="btn-outline-primary cursor-pointer"
                                            href="{{route('admin.artwork.approve',[$artwork->id])}}">Approve &rarr;</a>
                                            @else
                                                <a class="btn-outline-danger cursor-pointer"
                                            href="{{route('admin.artwork.deny',[$artwork->id])}}">Deny &rarr;</a>
                                            @endif
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
