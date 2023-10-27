@extends('layouts.admin.app')
@section('page_header')
Update Profile
@endsection
@section('content')




    <div class="container-fluid relative animatedParent animateOnce">
        <div class="tab-content pb-3" id="v-pills-tabContent">
            <!--Today Tab Start-->
            <div class="row p-t-b-10 ">

                <div class="col-md-6 mx-auto">

                    <div class="card">
                        <div class="card-header white">
                            <h6>Update Profile</h6>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="toast" data-title="Success" data-message="Successfully updated."
                                    data-type="success">
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="toast" data-title="Error" data-message="{{ session('error') }}"
                                    data-type="error">
                                </div>
                            @endif
                            @if (session('failed'))
                                <div class="toast" data-title="Old Password Error" data-message="{{ session('failed') }}"
                                    data-type="error">
                                </div>
                            @endif
                            <form class="needs-validation" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom01">Name</label>
                                        <input type="text" name="name"
                                            class="form-control " id="validationCustom01" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom01">Image</label>
                                        <input type="file" data-max-file-size="2M" name="image" class="form-control"
                                            id="validationCustom01" placeholder="Is Verified">
                                    </div>
                                </div>
                                <button class="btn btn-primary" style="background-color: #1FA7A8" id="submit"
                                    type="submit"><i class="icon-save"></i> Add User</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--Yesterday Tab Start-->
        </div>
    </div>
@endsection
