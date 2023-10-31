@extends('layouts.admin.app')
@section('page_header')
@endsection
@section('content')
    <div class="container my-3">
        <div class="card p-3">
            <div class="row">
                <div class="col-md-12">
                    
                    <form method="post" action="{{isset($faq)?route('admin.faq.update',[$faq->id]):route('admin.faq.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"  for="">Title</label>
                                    <input class="form-control" value="{{isset($faq)?$faq->title:''}}" type="text" name="title" >
                                    @error('title')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="">Question</label>
                                    <input class="form-control" value="{{isset($faq)?$faq->question:''}}" type="text" name="question">
                                    @error('question')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="">Answer</label>
                                    <input class="form-control" value="{{isset($faq)?$faq->answer:''}}" type="text" name="answer">
                                    @error('answer')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-outline-primary w-100">{{isset($faq)?'Update':'Submit'}}</button>
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
