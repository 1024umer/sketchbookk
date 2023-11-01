@extends('layout.app')
@section('content')
    <main class="main__content_wrapper">

        <!-- Start breadcrumb section -->
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content">
                            <h1 class="breadcrumb__content--title text-white mb-10">FAQS</h1>
                            <ul class="breadcrumb__content--menu d-flex">
                                <li class="breadcrumb__content--menu__items"><a class="text-white" href="index.php">Home</a>
                                </li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white">FAQ</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->

        <!-- Start about section -->
        <section class="about__section section--padding mb-95">
            <div class="container">
                <div class="accordion mb-5" id="accordionExample">
                    @foreach ($faqs as $faq)    
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          {{$faq->title}}
                        </button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <strong>{{$faq->question}}?</strong>{{$faq->answer}}
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
            </div>
        </section>
        <!-- End about section -->

    </main>
@endsection
