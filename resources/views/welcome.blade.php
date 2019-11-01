<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'rofkof') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Eczar:700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                position: absolute;
                top: 20%;
                text-align: center;
            }

            .title {
                font-size: 84px;
                color: #8F390A;
                font-family: 'Eczar', serif;
            }

            h5 {
                font-size: 20px;
                color: #C37B28;
                font-family: 'Eczar', serif;
            }

            .btn-rofkof {
                color: #8F390A;
                background: #E4A78B;
            }

            #filter, #filter-btn, #search {
                color: #C37B28;
                padding: 0 5px 15px 0;
                float: left;
                margin-left: 10px;
            }

            #filter-btn > a {
                color: #8F390A;
            }

            .pagination {
                margin: 25%
            }

            .page-link{
                color: #636b6f;
            }
            
            .page-item.active .page-link {
                background: #8F390A;
                border-color: #8F390A;
            }

            .card {
                margin: 26px;
            }

            #links-rofkof {
                margin: 0 0 40px 0;
                padding: 30px;
                background: #F8F7F3;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="container">
                <div class="content">
                    <div class="title m-b-md">
                        Rofkof
                    </div>

                    <div  id="links-rofkof" class="links">
                        <a href="/">Show all spots</a>
                        <a href="/spots/create">Create spot</a>
                        <a href="/spots">Your spot list</a>
                    </div>


                    <div class="container">
                        <div id="search" class="row col-md-12">
                            <form action="/search" method="POST" role="search">
                                @csrf
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search spots"> <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h5 id="filter">Filter:</h5>
                                <div id="filter-btn">
                                    <a href="/?region=central">Central</a> |
                                    <a href="/?region=rotterdam-zuid">Rotterdam-Zuid</a> |
                                    <a href="/?region=rotterdam-noord">Rotterdam-Noord</a> |
                                    <a href="/?region=blijdorp">Blijdorp</a> |
                                    <a href="/?region=feyenoord">Feyenoord</a> |
                                    <a href="/">Reset</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @forelse ($spots as $spot)
                                <div class="card" style="width: 20rem;">
                                    <img class="card-img-top" src="/storage/{{ $spot->image }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $spot->name }}</h5>
                                        <p class="card-text">Location: {{ $spot->location }} <br> Region: {{ $spot->region }}</p>
                                        <!-- Toevoegen van een website van de coffee shop -->
                                        <a href="{{ $spot->website }}" class="btn btn-rofkof"><strong>Bezoek website</strong></a>
                                    </div>
                                </div>
                                @empty
                                <div class="card-body">
                                    <h5 class="card-title">No spots to show!</h5>
                                </div>
                            </div>
                            @endforelse

                             {{ $spots->links() }}
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </body>
</html>
