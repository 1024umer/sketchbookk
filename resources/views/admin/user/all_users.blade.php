@extends('layouts.admin.app')
@section('page_header')
    All {{ Str::plural('User') }}
@endsection
@section('content')
    <div class="container-fluid relative animatedParent animateOnce">
        <div class="tab-content pb-3" id="v-pills-tabContent">
            <!--Today Tab Start-->
            <table id="yajra" class="table table-striped table-bordered nowrap">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" id="success_alert_home"role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td><a href="/admin/user/{{ $user->id }}/profile">{{ $user->name }}</a></td>
                            <td>{{ $user->email }}</td>
                            <td>{{$user->role_id == 2 ? 'Artist':'User'}}</td>
                            <td><span class="badge p-2 badge-"{{$user->is_approved == 0 ?'danger':'success'}}>{{$user->is_approved == 0 ? 'Not Approved' : 'Approved' }}</span></td>
                            <td>
                                <a class="btn btn-danger" href="{{route('admin.user.delete',[$user->id])}}">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <!--Yesterday Tab Start-->
        </div>
    </div>
    </div>
    {{-- page body end here --}}
    </div>
@endsection
