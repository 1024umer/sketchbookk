@extends('layouts.admin.app')
@section('page_header')
@endsection
@section('content')

<section class="container">
    @foreach ($artwork->image as $item)
    @if ($item->url) {{-- Check if $item has a valid image --}}
        <img style="width: 20%; height:20%;" src="{{ asset('storage/' . $item->url) }}" alt="">
    @endif
    @endforeach
    <div>
        <p>Artist: {{$artwork->user->name}}</p>
        <p>Title: {{$artwork->title}}</p>
        <p>Price: ${{$artwork->price}}</p>
        <p>Quantity: {{$artwork->quantity}}</p>
        <p>Description: </p>
        <?php print $artwork->description; ?>

        @if ($artwork->is_approved == 0)
            <a href="{{route('admin.artwork.approve',[$artwork->id])}}" class="btn btn-outline-primary">Approve</a>
        @else
            <a href="{{route('admin.artwork.deny',[$artwork->id])}}" class="btn btn-outline-danger">Deny</a>
        @endif
    </div>
</section>

@endsection
