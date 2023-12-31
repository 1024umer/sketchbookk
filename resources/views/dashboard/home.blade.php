@extends('layout.app')
@section('content')
    <main class="main__content_wrapper">
        <!-- Start slider section -->
        <section class="hero__slider--section">
            <div class="hero__slider--inner hero__slider--activation swiper">
                <div class="hero__slider--wrapper swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="hero__slider--items hero__slider--bg slider1">
                            <div class="container-fluid">
                                <div class="hero__slider--items__inner">
                                    <div class="row row-cols-1">
                                        <div class="col">
                                            <div class="slider__content text-center">
                                                <h2 class="slider__content--maintitle text-white h1">Urban Life</h2>
                                                {{-- <p class="slider__content--desc text-white mb-35 d-sm-2-none">City on the
                                                    Edge of Forever</p> --}}
                                                <a class="slider__content--btn primary__btn" href="{{route('shop')}}">Start to
                                                    Buying</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="hero__slider--items hero__slider--bg slider2">
                            <div class="container-fluid">
                                <div class="hero__slider--items__inner">
                                    <div class="row row-cols-1">
                                        <div class="col">
                                            <div class="slider__content text-center">
                                                <h2 class="slider__content--maintitle text-white h1">Urban Life</h2>
                                                {{-- <p class="slider__content--desc text-white mb-35 d-sm-2-none">City on the
                                                    Edge of Forever</p> --}}
                                                <a class="slider__content--btn primary__btn" href="{{route('shop')}}">Start to
                                                    Buying</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper__nav--btn swiper-button-next"></div>
                <div class="swiper__nav--btn swiper-button-prev"></div>
            </div>
        </section>
        <!-- End slider section -->

        <!-- Start shipping section -->
        <section class="shipping__section shipping__style2 section--padding color-scheme-2">
            <div class="container">
                <div class="shipping__style2--inner border-radius-10 d-flex justify-content-between">
                    <div class="shipping__style2--items d-flex align-items-center">
                        <div class="shipping__style2--icon">
                            <img src="{{asset('front/img/icon/shipping.svg')}}" alt="">
                        </div>
                        <div class="shipping__style2--content">
                            <h2 class="shipping__style2--content__title">Free Shipping Worldwide</h2>
                            <p class="shipping__style2--content__desc">On order above $150</p>
                        </div>
                    </div>
                    <div class="shipping__style2--items d-flex align-items-center">
                        <div class="shipping__style2--icon">
                            <img src="{{asset('front/img/icon/cash.svg')}}" alt="">
                        </div>
                        <div class="shipping__style2--content">
                            <h2 class="shipping__style2--content__title">Pay by Credit or Debit Card</h2>
                            <p class="shipping__style2--content__desc">100% money back guarantee</p>
                        </div>
                    </div>
                    <div class="shipping__style2--items d-flex align-items-center">
                        <div class="shipping__style2--icon">
                            <img src="{{asset('front/img/icon/gift.svg')}}" alt="">
                        </div>
                        <div class="shipping__style2--content">
                            <h2 class="shipping__style2--content__title">Special Gift Card</h2>
                            <p class="shipping__style2--content__desc">Offer special bonuses with gift</p>
                        </div>
                    </div>
                    <div class="shipping__style2--items d-flex align-items-center">
                        <div class="shipping__style2--icon" style="    border: 2px solid #60d760;border-radius: 72%;padding: 13px 18px;">
                            <i class="fa-regular fa-envelope" style="color: #ffffff;"></i>                        </div>
                        <div class="shipping__style2--content">
                            <h2 class="shipping__style2--content__title">24/7 Customer Service</h2>

                            <p class="shipping__style2--content__desc">Email us info@sketchbookonline.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End shipping section -->

        <!-- Start product section -->
        <section class="product__section section--padding color-scheme-2">
            <div class="container">
                <div class="product__section--header mb-40">
                    <div class="section__heading text-center">
                        <h2 class="section__heading--maintitle">Featured Artists</h2>
                    </div>
                </div>
                <div class="tab_content">
                    <div id="chair" class="tab_pane active show">
                        <div class="product__section--inner">
                            <div class="row row-cols-lg-4 row-cols-md-3 row-cols-2 mb--n30">
                                @foreach ($artists as $artist)                                    
                                    <div class="col mb-30">
                                        <div class="product__items ">
                                            <div class="product__items--thumbnail">
                                                <a class="product__items--link" href="{{route('shop')}}">
                                                    <img class="product__items--img product__primary--img"
                                                        src="{{$artist->image_url}}" alt="product-img">
                                                </a>
                                            </div>
                                            <div class="product__items--content text-center">
                                                <h3 class="product__items--content__title h4"><a href="{{route('shop')}}">{{$artist->name}}</a></h3>
                                                {{-- <a class="product__items--content__tag" href="product-details.php">United
                                                    States</a> --}}
                                                
                                            </div>
                                        </div>
                                    </div>
                                @endforeach 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End product section -->

        <!-- Start banner section -->
        <section class="banner__section section--padding color-scheme-2 pt-0">
            <div class="container">
                <div class="product__section--header mb-40">
                    <div class="section__heading text-center">
                        <h2 class="section__heading--maintitle">Inspiring Arts</h2>
                    </div>
                </div>
                <div class="row mb--n28">
                    <div class="col-lg-6 col-md-6 banner2__col--6 mb-28">
                        <div class="banner__items position__relative">
                            <a class="banner__items--thumbnail " href="shop.php"><img
                                    class="banner__items--thumbnail__img" src="{{asset('front/img/arts-cat/digital-art.jpg')}}"
                                    alt="banner-img">
                                <div class="banner__content--style2">
                                    <h2 class="banner__content--style2--title">Digital Arts</h2>
                                    <h3 class="banner__content--style2__subtitle">Lorem Ipsum is simply dummy text of the
                                        printing and typesetting industry.</h3>
                                    <span class="banner__content--style2__link primary__btn style2">View All</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 banner2__col--6r mb-28">
                        <div class="banner__items position__relative mb-25">
                            <a class="banner__items--thumbnail " href="{{route('shop')}}"><img
                                    class="banner__items--thumbnail__img banner__img--height"
                                    src="{{asset('front/img/arts-cat/fine-art.jpg')}}" alt="banner-img">
                                <div class="banner__content--style2">
                                    <h3 class="banner__content--style2__subtitle text-ofwhite d-md-none">Lorem Ipsum is
                                        simply dummy text of the
                                        printing and typesetting industry.</h3>
                                    <h2 class="banner__content--style2--title text-white">Visual Arts</h2>
                                    <span class="banner__content--style2__link primary__btn style2 text-white">View
                                        All</span>
                                </div>
                            </a>
                        </div>
                        <div class="banner__items position__relative mb-25">
                            <a class="banner__items--thumbnail " href="{{route('shop')}}"><img
                                    class="banner__items--thumbnail__img banner__img--height"
                                    src="{{asset('front/img/arts-cat/visual-art.jpg')}}" alt="banner-img">
                                <div class="banner__content--style2">
                                    <h3 class="banner__content--style2__subtitle text-ofwhite d-md-none">Lorem Ipsum is
                                        simply dummy text of the
                                        printing and typesetting industry.</h3>
                                    <h2 class="banner__content--style2--title text-white">Visual Arts</h2>
                                    <span class="banner__content--style2__link primary__btn style2 text-white">View
                                        All</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End banner section -->

        <!-- Start product section -->
        <section class="product__section section--padding pt-0">
            <div class="container">
                <div class="section__heading text-center mb-30">
                    <h2 class="section__heading--maintitle">Popular Arts</h2>
                </div>
                <div class="tab_content">
                    <div id="chair" class="tab_pane active show">
                        <div class="product__section--inner">
                            <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2 mb--n30">
                                @foreach ($featuredproducts as $product)                                    
                                    <div class="col mb-30">
                                        <div class="product__items ">
                                            <div class="product__items--thumbnail">
                                                <a class="product__items--link" href="{{route('product.details',[$product->id])}}">
                                                    <img class="product__items--img product__primary--img"
                                                        src="{{asset('storage/'.$product->imageOne->url)}}" alt="product-img">
                                                </a>
                                                <div class="product__badge">
                                                    <span class="product__badge--items sale">New</span>
                                                </div>
                                                <ul class="product__items--action d-flex justify-content-center">
                                                    <li class="product__items--action__list">
                                                        <a class="product__items--action__btn" data-open="modal1"
                                                            href="javascript:void(0)">
                                                            <svg class="product__items--action__btn--svg"
                                                                xmlns="http://www.w3.org/2000/svg" width="20.51"
                                                                height="19.443" viewBox="0 0 512 512">
                                                                <path
                                                                    d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z"
                                                                    fill="none" stroke="currentColor"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="32" />
                                                                <circle cx="256" cy="256" r="80"
                                                                    fill="none" stroke="currentColor"
                                                                    stroke-miterlimit="10" stroke-width="32" />
                                                            </svg>
                                                            <span class="visually-hidden">Quick View</span>
                                                        </a>
                                                    </li>
                                                    <li class="product__items--action__list">
                                                        <a class="product__items--action__btn" href="wishlist.php">
                                                            <svg class="product__items--action__btn--svg"
                                                                xmlns="http://www.w3.org/2000/svg" width="17.51"
                                                                height="15.443" viewBox="0 0 24.526 21.82">
                                                                <path
                                                                    d="M12.263,21.82a1.438,1.438,0,0,1-.948-.356c-.991-.866-1.946-1.681-2.789-2.4l0,0a51.865,51.865,0,0,1-6.089-5.715A9.129,9.129,0,0,1,0,7.371,7.666,7.666,0,0,1,1.946,2.135,6.6,6.6,0,0,1,6.852,0a6.169,6.169,0,0,1,3.854,1.33,7.884,7.884,0,0,1,1.558,1.627A7.885,7.885,0,0,1,13.821,1.33,6.169,6.169,0,0,1,17.675,0,6.6,6.6,0,0,1,22.58,2.135a7.665,7.665,0,0,1,1.945,5.235,9.128,9.128,0,0,1-2.432,5.975,51.86,51.86,0,0,1-6.089,5.715c-.844.719-1.8,1.535-2.794,2.4a1.439,1.439,0,0,1-.948.356ZM6.852,1.437A5.174,5.174,0,0,0,3,3.109,6.236,6.236,0,0,0,1.437,7.371a7.681,7.681,0,0,0,2.1,5.059,51.039,51.039,0,0,0,5.915,5.539l0,0c.846.721,1.8,1.538,2.8,2.411,1-.874,1.965-1.693,2.812-2.415a51.052,51.052,0,0,0,5.914-5.538,7.682,7.682,0,0,0,2.1-5.059,6.236,6.236,0,0,0-1.565-4.262,5.174,5.174,0,0,0-3.85-1.672A4.765,4.765,0,0,0,14.7,2.467a6.971,6.971,0,0,0-1.658,1.918.907.907,0,0,1-1.558,0A6.965,6.965,0,0,0,9.826,2.467a4.765,4.765,0,0,0-2.975-1.03Zm0,0"
                                                                    transform="translate(0 0)" fill="currentColor"></path>
                                                            </svg>
                                                            <span class="visually-hidden">Wishlist</span>
                                                        </a>
                                                    </li>
                                                    <li class="product__items--action__list">
                                                        <a class="product__items--action__btn" href="compare.php">
                                                            <svg class="product__items--action__btn--svg"
                                                                xmlns="http://www.w3.org/2000/svg" width="16.47"
                                                                height="13.088" viewBox="0 0 15.47 11.088">
                                                                <g transform="translate(0 -72.508)">
                                                                    <path data-name="Path 114"
                                                                        d="M15.359,80.9l-2.011-2.011a.525.525,0,0,0-.374-.155H11.291a.287.287,0,0,0-.2.49l1.106,1.106H10.576L8.3,78.052l2.273-2.274h1.618l-1.106,1.106a.287.287,0,0,0,.2.49h1.683a.531.531,0,0,0,.374-.155l2.011-2.011a.38.38,0,0,0,0-.535l-.859-.859a.227.227,0,1,0-.32.321l.806.806L13.027,76.9a.075.075,0,0,1-.053.022H11.692l1.054-1.054a.317.317,0,0,0-.224-.542h-2.04a.227.227,0,0,0-.16.066l-2.34,2.34-.544-.544,2.519-2.519a.382.382,0,0,1,.272-.112h2.293a.317.317,0,0,0,.225-.542l-1.054-1.054h1.282a.076.076,0,0,1,.053.022l.4.4a.227.227,0,1,0,.32-.321l-.4-.4a.531.531,0,0,0-.374-.155H11.291a.287.287,0,0,0-.2.49L12.194,74.1H10.229a.832.832,0,0,0-.592.245L7.118,76.867,4.6,74.349a.832.832,0,0,0-.592-.245H.378A.378.378,0,0,0,0,74.481v.92a.378.378,0,0,0,.378.378H3.66l2.273,2.274L3.66,80.326H.378A.378.378,0,0,0,0,80.7v.92A.378.378,0,0,0,.378,82H4.007a.835.835,0,0,0,.592-.245l2.519-2.519.8.8a.227.227,0,1,0,.32-.32L3.914,75.392a.227.227,0,0,0-.16-.066H.453v-.769H4.007a.382.382,0,0,1,.272.113l6.043,6.043a.227.227,0,0,0,.16.066h2.04a.317.317,0,0,0,.224-.542l-1.054-1.054h1.282a.075.075,0,0,1,.053.022l1.958,1.958-1.958,1.958a.075.075,0,0,1-.053.022H11.692l1.054-1.054a.317.317,0,0,0-.224-.542H10.229a.383.383,0,0,1-.272-.113l-.968-.968a.227.227,0,0,0-.32.32l.968.968a.833.833,0,0,0,.592.245h1.965l-1.105,1.105a.287.287,0,0,0,.2.49h1.683a.525.525,0,0,0,.374-.155l2.011-2.011A.379.379,0,0,0,15.359,80.9Zm-11.08.539a.389.389,0,0,1-.272.113H.453v-.769h3.3a.226.226,0,0,0,.16-.066l2.34-2.34.543.544Z"
                                                                        transform="translate(0 0)" fill="currentColor" />
                                                                </g>
                                                            </svg>
                                                            <span class="visually-hidden">Compare</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="product__items--content text-center">
                                                <h3 class="product__items--content__title h4"><a
                                                        href="product-details.php">{{$product->title}}</a></h3>
                                                <div class="product__items--price">
                                                    <span class="current__price">{{$product->price}}</span>
                                                    <!-- <span class="old__price">$200.00</span> -->
                                                </div>
                                                <a class="product__items--action__cart--btn primary__btn" href="cart.php">
                                                    <svg class="product__items--action__cart--btn__icon"
                                                        xmlns="http://www.w3.org/2000/svg" width="13.897" height="14.565"
                                                        viewBox="0 0 18.897 21.565">
                                                        <path
                                                            d="M16.84,8.082V6.091a4.725,4.725,0,1,0-9.449,0v4.725a.675.675,0,0,0,1.35,0V9.432h5.4V8.082h-5.4V6.091a3.375,3.375,0,0,1,6.75,0v4.691a.675.675,0,1,0,1.35,0V9.433h3.374V21.581H4.017V9.432H6.041V8.082H2.667V21.641a1.289,1.289,0,0,0,1.289,1.29h16.32a1.289,1.289,0,0,0,1.289-1.29V8.082Z"
                                                            transform="translate(-2.667 -1.366)" fill="currentColor"></path>
                                                    </svg>
                                                    <span class="add__to--cart__text"> Add to cart</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End product section -->

        <!-- Start Newsletter banner section -->
        <section class="newsletter__banner--section section--padding color-scheme-2 pt-0">
            <div class="container">
                <div class="newsletter__banner--thumbnail position__relative">
                    <img class="newsletter__banner--thumbnail__img" src="{{asset('front/img/banner/newsletter-bg.jpg')}}"
                        alt="newsletter-banner">
                    <div class="newsletter__content style2 newsletter__subscribe">
                        <h5 class="newsletter__content--subtitle">Want to offer regularly ?</h5>
                        <h3 class="newsletter__content--title h3 mb-0 text-center">Subscribe Our Newsletter <br>
                            for Get Daily Update</h3>
                            <h5 class="newsletter__content--subtitle mb-3">Join our list and get 10% off on your first purchase. Dont worry we dont spam</h5>
                        <form class="newsletter__subscribe--form position__relative" action="#">
                            <label>
                                <input class="newsletter__subscribe--input border-radius-20"
                                    placeholder="Enter your email address" type="email" required>
                            </label>
                            <button class="newsletter__subscribe--button primary__btn btn__style2"
                                type="submit">Subscribe
                                <svg class="newsletter__subscribe--button__icon" xmlns="http://www.w3.org/2000/svg"
                                    width="9.159" height="7.85" viewBox="0 0 9.159 7.85">
                                    <path data-name="Icon material-send"
                                        d="M3,12.35l9.154-3.925L3,4.5,3,7.553l6.542.872L3,9.3Z"
                                        transform="translate(-3 -4.5)" fill="currentColor" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
