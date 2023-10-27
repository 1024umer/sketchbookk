@extends('layouts.admin.app')
@section('page_header')
@endsection
@section('content')
    <div class="container my-3">
        <div class="card p-3">
            <div class="row">
                <div class="col-md-12">
                    
                    <form method="post" action="{{isset($category)?route('admin.category.update',[$category->id]):route('admin.category.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"  for="">Name</label>
                                    <input class="form-control" value="{{isset($category)?$category->name:''}}" type="text" name="name" id="name">
                                    @error('name')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="">Slug</label>
                                    <input class="form-control" value="{{isset($category)?$category->slug:''}}" type="text" name="slug" id="slug">
                                    @error('slug')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input {{isset($category) && $category->is_active == 1 ? 'checked' : ''}} type="checkbox" name="is_active" id="">
                                <label for="" class="form-label">Do you want to make this category active ?</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-outline-primary w-100">{{isset($category)?'Update':'Submit'}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')    
<script>
    $(document).ready(function() {
        var $nameInput = $('#name');
        var $slugInput = $('#slug');
        $nameInput.on('input', function() {
            var nameValue = $nameInput.val();
            var slugValue = nameValue.toLowerCase().replace(/\s+/g, '-');
            $slugInput.val(slugValue);
        });
    });
</script>
@endpush
