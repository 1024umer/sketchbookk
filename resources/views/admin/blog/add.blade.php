@extends('layouts.admin.app')
@section('page_header')
@endsection
@section('content')
    <div class="container my-3">
        <div class="card p-3">
            <div class="row">
                <div class="col-md-12">
                    
                    <form enctype="multipart/form-data" method="post" action="{{isset($blog)?route('admin.blog.update',[$blog->id]):route('admin.blog.store')}}">
                        @csrf
                        @if (session('error'))
                            <div class="alert alert-success alert-dismissible fade show" id="success_alert_home"role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"  for="">Title</label>
                                    <input class="form-control" value="{{isset($blog)?$blog->title:''}}" type="text" name="title" id="title">
                                    @error('title')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="">Slug</label>
                                    <input class="form-control" value="{{isset($blog)?$blog->slug:''}}" type="text" name="slug" id="slug">
                                    @error('slug')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="">Name</label>
                                    <input class="form-control" value="{{isset($blog)?$blog->name:''}}" type="text" name="name" id="">
                                    @error('name')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="contact__form--textarea" name="description" id="input5" placeholder="Enter your Blog's description...It should be brief enough so that user can understand">{{isset($blog)?$blog->description:''}}</textarea>
                                    @error('description')
                                        <label class="for-error">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-4">
                                    <label for="" class="form-label"> This image will be for banner image in blog</label>
                                    <input type="file" name="file" id="dropify" data-allowed-file-extensions="png jpg jpeg">
                                    @error('file')
                                        <label class="for-error">{{ $message }}</label>
                                    @enderror
                                </div>
                                @if (isset($blog))
                                    <img src="{{asset('storage/'.$blog->image->url)}}" alt="">
                                @endif
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input {{isset($blog) && $blog->is_active == 1 ? 'checked' : ''}} type="checkbox" name="is_active" id="">
                                    <label for="" class="form-label">Do you want to make this blog active ?</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input {{isset($blog) && $blog->is_featured == 1 ? 'checked' : ''}} type="checkbox" name="is_featured" id="">
                                    <label for="" class="form-label">Do you want to make this blog display on home page ?</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-outline-primary w-100">{{isset($blog)?'Update':'Submit'}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor5/40.0.0/ckeditor.min.js" integrity="sha512-Zyl/SvrviD3rEMVNCPN+m5zV0PofJYlGHnLDzol2kM224QpmWj9p5z7hQYppmnLFhZwqif5Fugjjouuk5l1lgA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        var $nameInput = $('#title');
        var $slugInput = $('#slug');
        $nameInput.on('input', function() {
            var nameValue = $nameInput.val();
            var slugValue = nameValue.toLowerCase().replace(/\s+/g, '-');
            $slugInput.val(slugValue);
        });
        
        ClassicEditor
        .create( document.querySelector( '#input5' ) )
        .catch( error => {
            console.error( error );
        } );
        $('#dropify').dropify();

    });
</script>
@endpush
