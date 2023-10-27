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
                                    <th class="">Email</th>
                                    <th width="150px">Message</th>
                                    <th width="150px">Action</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @foreach ($contacts as $contact)
                                <input type="hidden" name="user_id" value="{{$contact->id}}" id="user_id">
                                    <tr>
                                        <td>{{$contact->email}}</td>
                                        <td>{{$contact->message}}</td>
                                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Reply</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <form action="{{route('admin.contact.reply')}}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="hidden" name="user_id" id="userId">
                                            <label for="" class="form-label">Reply to user</label>
                                            <textarea name="message" class="form-control" id="" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">SEND MAIL</button>
                                    </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        {{-- <button type="submit" class="btn btn-sm mb-2 btn-success">
                            Update sequence
                        </button> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    var userId = $('#user_id').val()
    $('#userId').val(userId);
</script>
@endpush