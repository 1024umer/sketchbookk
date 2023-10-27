<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Laravel</title>
        @include('layouts.admin.app')
    </head>
    <body class="light">
        {{-- pre loader --}}
        <div id="app">


            {{-- page body start here --}}

            <div class="container">
                <div class="row mt-5 ml-5">
                    <div class="col-md-4">
                        <div class="border shadow p-5 bg-white">
                            <div class="row">
                                <div class="col-md-6">
                                    Total Users
                                </div>
                                <div class="col-md-6">
                                    {{$user}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="border shadow p-5 bg-white">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Total Products</h4>
                                </div>
                                <div class="col-md-6">
                                    <h5>{{$product}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="border shadow p-5 bg-white">
                            <div class="row">
                                <div class="col-md-6">
                                    Total Users
                                </div>
                                <div class="col-md-6">
                                    {{$user}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
            </div>

            {{-- page body end here --}}
        </div>

    </body>
</html>
