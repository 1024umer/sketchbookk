@extends('layout.app')
@section('content')

<main class="main__content_wrapper">

    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content">
                        <h1 class="breadcrumb__content--title text-white mb-10">Shop</h1>
                        <ul class="breadcrumb__content--menu d-flex">
                            <li class="breadcrumb__content--menu__items"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text-white">Shop</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- Start shop section -->
    <section class="shop__section section--padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="shop__sidebar--widget widget__area d-md-2-none">
                        <div class="single__widget widget__bg">
                            <h2 class="widget__title position__relative h3">Search</h2>
                            <form class="widget__search--form" method="POST" action="{{route('products.search')}}">
                                @csrf
                                <label>
                                    <input name="search" class="widget__search--form__input" placeholder="Search by" type="search">
                                </label>
                                <button class="widget__search--form__btn" type="submit">
                                    Search
                                </button>
                            </form>
                        </div>
                        <div class="single__widget price__filter widget__bg">
                            <h2 class="widget__title position__relative h3">Filter By Price</h2>
                            <form class="price__filter--form" method="POST" action="{{route('products.search.price')}}">
                                @csrf
                                <div class="price__filter--form__inner mb-15 d-flex align-items-center">
                                    <div class="price__filter--group">
                                        <label class="price__filter--label" for="Filter-Price-GTE1">From</label>
                                        <div class="price__filter--input border-radius-5 d-flex align-items-center">
                                            <span class="price__filter--currency">$</span>
                                            <input required class="price__filter--input__field border-0" id="Filter-Price-GTE1" name="from" type="number" placeholder="0" min="0">
                                        </div>
                                    </div>
                                    <div class="price__divider">
                                        <span>-</span>
                                    </div>
                                    <div class="price__filter--group">
                                        <label class="price__filter--label" for="Filter-Price-LTE1">To</label>
                                        <div class="price__filter--input border-radius-5 d-flex align-items-center">
                                            <span class="price__filter--currency">$</span>
                                            <input required class="price__filter--input__field border-0" id="Filter-Price-LTE1" name="to" type="number" min="0" placeholder="250.00">
                                        </div>
                                    </div>
                                </div>
                                <button class="price__filter--btn primary__btn" type="submit">Filter</button>
                            </form>
                        </div>
                        <div class="single__widget widget__bg">
                            <h2 class="widget__title position__relative h3">Art Category</h2>
                            <ul class="widget__form--check">
                                @foreach ($categories as $category)                                    
                                <a href="{{route('products.search.category',[$category->id])}}">
                                    <li class="widget__form--check__list">
                                            <label class="widget__form--check__label" for="check1">{{$category->name}}</label>
                                            <input class="widget__form--check__input" type="checkbox">
                                            <span class="widget__form--checkmark"></span>
                                        </li>
                                    </a>
                                @endforeach
                            </ul>
                        </div>
                        <div class="single__widget widget__bg">
                            <h2 class="widget__title position__relative h3">Artist</h2>
                            <ul class="widget__tagcloud">
                                @foreach ($artists as $artist)
                                    <li class="widget__tagcloud--list"><a class="widget__tagcloud--link" href="{{route('products.search.artist',[$artist->id])}}">{{$artist->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    @if (session('complete'))
                        <div class="alert alert-success alert-dismissible fade show" id="success_alert_home"role="alert">
                            {{ session('complete') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-error alert-dismissible fade show" id="success_alert_home"role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="shop__header bg__gray--color d-flex align-items-center justify-content-between mb-30">
                        <button class="widget__filter--btn d-none d-md-2-flex align-items-center">
                            <svg class="widget__filter--btn__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28" d="M368 128h80M64 128h240M368 384h80M64 384h240M208 256h240M64 256h80" />
                                <circle cx="336" cy="128" r="28" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28" />
                                <circle cx="176" cy="256" r="28" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28" />
                                <circle cx="336" cy="384" r="28" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28" />
                            </svg>
                            <span class="widget__filter--btn__text">Filter</span>
                        </button>
                        {{-- <div class="product__view--mode d-flex align-items-center">
                            <div class="product__view--mode__list product__short--by align-items-center d-none d-lg-flex">
                                <label class="product__view--label">Prev Page :</label>
                                <div class="select shop__header--select">
                                    <select class="product__view--select">
                                        <option selected value="1">65</option>
                                        <option value="2">40</option>
                                        <option value="3">42</option>
                                        <option value="4">57 </option>
                                        <option value="5">60 </option>
                                    </select>
                                </div>
                            </div>
                            <div class="product__view--mode__list product__short--by align-items-center d-none d-lg-flex">
                                <label class="product__view--label">Sort By :</label>
                                <div class="select shop__header--select">
                                    <select class="product__view--select">
                                        <option selected value="1">Sort by latest</option>
                                        <option value="2">Sort by popularity</option>
                                        <option value="3">Sort by newness</option>
                                        <option value="4">Sort by rating </option>
                                    </select>
                                </div>
                            </div>
                            <div class="product__view--mode__list">
                                <div class="product__grid--column__buttons d-flex justify-content-center">
                                    <button class="product__grid--column__buttons--icons active" data-toggle="tab" aria-label="product grid btn" data-target="#product_grid">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 9 9">
                                            <g transform="translate(-1360 -479)">
                                                <rect id="Rectangle_5725" data-name="Rectangle 5725" width="4" height="4" transform="translate(1360 479)" fill="currentColor" />
                                                <rect id="Rectangle_5727" data-name="Rectangle 5727" width="4" height="4" transform="translate(1360 484)" fill="currentColor" />
                                                <rect id="Rectangle_5726" data-name="Rectangle 5726" width="4" height="4" transform="translate(1365 479)" fill="currentColor" />
                                                <rect id="Rectangle_5728" data-name="Rectangle 5728" width="4" height="4" transform="translate(1365 484)" fill="currentColor" />
                                            </g>
                                        </svg>
                                    </button>
                                    <button class="product__grid--column__buttons--icons" data-toggle="tab" aria-label="product list btn" data-target="#product_list">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 13 8">
                                            <g id="Group_14700" data-name="Group 14700" transform="translate(-1376 -478)">
                                                <g transform="translate(12 -2)">
                                                    <g id="Group_1326" data-name="Group 1326">
                                                        <rect id="Rectangle_5729" data-name="Rectangle 5729" width="3" height="2" transform="translate(1364 483)" fill="currentColor" />
                                                        <rect id="Rectangle_5730" data-name="Rectangle 5730" width="9" height="2" transform="translate(1368 483)" fill="currentColor" />
                                                    </g>
                                                    <g id="Group_1328" data-name="Group 1328" transform="translate(0 -3)">
                                                        <rect id="Rectangle_5729-2" data-name="Rectangle 5729" width="3" height="2" transform="translate(1364 483)" fill="currentColor" />
                                                        <rect id="Rectangle_5730-2" data-name="Rectangle 5730" width="9" height="2" transform="translate(1368 483)" fill="currentColor" />
                                                    </g>
                                                    <g id="Group_1327" data-name="Group 1327" transform="translate(0 -1)">
                                                        <rect id="Rectangle_5731" data-name="Rectangle 5731" width="3" height="2" transform="translate(1364 487)" fill="currentColor" />
                                                        <rect id="Rectangle_5732" data-name="Rectangle 5732" width="9" height="2" transform="translate(1368 487)" fill="currentColor" />
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <p class="product__showing--count">Showing 1–9 of 21 results</p> --}}
                    </div>
                    <div class="shop__product--wrapper">
                        <div class="tab_content">
                            <div id="product_grid" class="tab_pane active show">
                                <div class="product__section--inner product__grid--inner">
                                    <div class="row row-cols-xxl-4 row-cols-xl-3 row-cols-lg-3 row-cols-md-3 row-cols-2 mb--n30">
                                        @foreach ($products as $product)    
                                            <div class="col mb-30">
                                                <div class="product__items ">
                                                    <div class="product__items--thumbnail">
                                                        <a class="product__items--link" href="{{route('product.details',[$product->id])}}">
                                                            <img class="product__items--img product__primary--img" src="{{asset('storage/'. $product->imageOne->url)}}" alt="product-img">
                                                        </a>
                                                        <ul class="product__items--action d-flex justify-content-center">
                                                            {{-- <li class="product__items--action__list">
                                                                <a class="product__items--action__btn" data-open="modal1" href="javascript:void(0)">
                                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="20.51" height="19.443" viewBox="0 0 512 512">
                                                                        <path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
                                                                        <circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
                                                                    </svg>
                                                                    <span class="visually-hidden">Quick View</span>
                                                                </a>
                                                            </li>
                                                            <li class="product__items--action__list">
                                                                <a class="product__items--action__btn wishlist-button" data-product-id="{{ $product->id }}" href="javascript:void(0)">
                                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="17.51" height="15.443" viewBox="0 0 24.526 21.82">
                                                                        <path d="M12.263,21.82a1.438,1.438,0,0,1-.948-.356c-.991-.866-1.946-1.681-2.789-2.4l0,0a51.865,51.865,0,0,1-6.089-5.715A9.129,9.129,0,0,1,0,7.371,7.666,7.666,0,0,1,1.946,2.135,6.6,6.6,0,0,1,6.852,0a6.169,6.169,0,0,1,3.854,1.33,7.884,7.884,0,0,1,1.558,1.627A7.885,7.885,0,0,1,13.821,1.33,6.169,6.169,0,0,1,17.675,0,6.6,6.6,0,0,1,22.58,2.135a7.665,7.665,0,0,1,1.945,5.235,9.128,9.128,0,0,1-2.432,5.975,51.86,51.86,0,0,1-6.089,5.715c-.844.719-1.8,1.535-2.794,2.4a1.439,1.439,0,0,1-.948.356ZM6.852,1.437A5.174,5.174,0,0,0,3,3.109,6.236,6.236,0,0,0,1.437,7.371a7.681,7.681,0,0,0,2.1,5.059,51.039,51.039,0,0,0,5.915,5.539l0,0c.846.721,1.8,1.538,2.8,2.411,1-.874,1.965-1.693,2.812-2.415a51.052,51.052,0,0,0,5.914-5.538,7.682,7.682,0,0,0,2.1-5.059,6.236,6.236,0,0,0-1.565-4.262,5.174,5.174,0,0,0-3.85-1.672A4.765,4.765,0,0,0,14.7,2.467a6.971,6.971,0,0,0-1.658,1.918.907.907,0,0,1-1.558,0A6.965,6.965,0,0,0,9.826,2.467a4.765,4.765,0,0,0-2.975-1.03Zm0,0" transform="translate(0 0)" fill="currentColor"></path>
                                                                    </svg>
                                                                    <span class="visually-hidden">Wishlist</span>
                                                                </a>
                                                            </li> --}}
                                                        </ul>
                                                    </div>
                                                    <div class="product__items--content text-center">
                                                        <h3 class="product__items--content__title h4"><a href="product-details.php">{{$product->title}}</a></h3>
                                                        <div class="product__items--price">
                                                            <span class="current__price">{{'$'.$product->price}}</span>
                                                            <!-- <span class="old__price">$200.00</span> -->
                                                        </div>
                                                        <form >
                                                            <button class="product__items--action__cart--btn primary__btn add-to-cart-button" data-product-id="{{$product->id}}">
                                                                <svg class="product__items--action__cart--btn__icon" xmlns="http://www.w3.org/2000/svg" width="13.897" height="14.565" viewBox="0 0 18.897 21.565">
                                                                    <path d="M16.84,8.082V6.091a4.725,4.725,0,1,0-9.449,0v4.725a.675.675,0,0,0,1.35,0V9.432h5.4V8.082h-5.4V6.091a3.375,3.375,0,0,1,6.75,0v4.691a.675.675,0,1,0,1.35,0V9.433h3.374V21.581H4.017V9.432H6.041V8.082H2.667V21.641a1.289,1.289,0,0,0,1.289,1.29h16.32a1.289,1.289,0,0,0,1.289-1.29V8.082Z" transform="translate(-2.667 -1.366)" fill="currentColor"></path>
                                                                </svg>
                                                                <span class="add__to--cart__text"> Add to cart</span>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pagination__area bg__gray--color">
                            <nav class="pagination justify-content-center">
                                {{$products->links()}}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End shop section -->
</main>

@endsection
@push('js')
<script>
    $('.add-to-cart-button').on('click', function (e) {
        e.preventDefault();
        var product_id = $(this).data('product-id'); // Get product_id from data attribute
        var form = $(this).closest('form'); // Find the closest form element to the button

        $.ajax({
            type: 'POST',
            url: '{{ route('cart.add') }}',
            data: {
                '_token': '{{ csrf_token() }}',
                'product_id': product_id
            }
        })
        .then(function(data){
            if(data.success){
                Swal.fire({
                    icon:'success',
                    title:'Success',
                    text: data.success
                })
            }else{
                Swal.fire({
                    icon:'error',
                    title:'Warning',
                    text: data.error
                })
            }
        })
    });
    $(document).ready(function() {
        $('.wishlist-button').on('click', function() {
            var productId = $(this).data('product-id');
            var isAddedToWishlist = $(this).hasClass('in-wishlist');

            $.ajax({
                type: 'POST',
                url: isAddedToWishlist ? "{{ route('user.wishlist.remove') }}" : "{{ route('user.wishlist.add') }}",
                data: {
                    product_id: productId,
                    _token: "{{ csrf_token() }}",
                },
                success: function (data) {
                    if (isAddedToWishlist) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data.success,
                        });
                        $button.addClass('in-wishlist');
                        $button.find('svg').css('background', 'secondary-color');
                    } else {
                        $button.removeClass('in-wishlist');
                        $button.find('svg').css('background', '#fff');
                    }
                },
                error: function (xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: error,
                    });
                },
            });
        });

        // Highlight products in the user's wishlist
        var wishlist = @json(isset($wishlist));
        wishlist.forEach(function(productId) {
            $('.wishlist-button[data-product-id="' + productId + '"]').addClass('in-wishlist');
            $('.wishlist-button[data-product-id="' + productId + '"] svg').css('background', 'secondary-color');
        });
    });
</script>


@endpush