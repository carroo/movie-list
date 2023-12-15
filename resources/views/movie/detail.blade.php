@extends('layouts.temp')

@section('content')
    <section id="home" class="iq-main-slider p-0">
        <div id="home-slider" class="slider m-0 p-0">
            <div class="slide slick-bg s-bg-1"
                style="background-image: url(../images/background/{{ $data->background }});">
                <div class="container-fluid position-relative h-200">
                    <div class="slider-inner h-100">
                        <div class="row align-items-center  h-200">
                            <div class="col-md-12">
                                <h1 class="slider-text big-title title text-uppercase">@if (strlen($data->title) <= 20)
                                    {{ $data->title }}
                                @else
                                    {{ substr($data->title, 0, 20) }}...
                                @endif</h1>
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="{{ asset('images/thumbnail/' . $data->thumbnail) }}" height="350"
                                            width="100" class="card-img-top img" style="border-radius: 10px"
                                            alt="Card image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Slider End -->
    <!-- MainContent -->
    <div class="main-content">
        <section id="iq-favorites">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 overflow-hidden">
                        <div class="iq-main-header d-flex align-items-center justify-content-between">
                            <h4 class="main-title">Detail Information</h4>
                        </div>
                        <div class="favorites-contens">
                            <ul class="row p-0 mb-0">
                                <li class="col-md-3">
                                    <div class="card text-white bg-transparent">
                                        <div class="card-body">
                                            <a href="{{ route('movie_detail', $data->id) }}">
                                                <h3 class="card-title">{{ $data->title }}</h3>
                                            </a>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h6>{{ date('d F Y', strtotime($data->release_date)) }}</h6>
                                                    <p>date release</p>
                                                    <h6>
                                                        @foreach ($data->genre as $value)
                                                            {{ $value->gr->genre }}
                                                        @endforeach
                                                    </h6>
                                                    <p>genre</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        @auth
                                            @if (auth()->user()->role == 0)
                                                <div class="col-md-6">
                                                    <a href="{{ route('movie_form_edit', $data->id) }}"
                                                        class="btn btn-block btn-outline-warning" type="button" id="more_actor">
                                                        Update <i class="fa fa-bars" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="{{ route('movie_delete', $data->id) }}"
                                                        class="btn btn-block btn-outline-danger" type="button" id="more_actor">
                                                        Delete <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            @else
                                                @if (auth()->user()->watch_list->where('movie_id', $data->id)->count() == 0)
                                                    <a href="{{ route('watch_lists_add', $data->id) }}"
                                                        class="btn btn-block btn-outline-success" type="button" id="more_actor">
                                                        Add to watch list <i class="fa fa-plus" aria-hidden="true"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('watch_lists_add', $data->id) }}"
                                                        class="btn btn-block btn-outline-danger" type="button" id="more_actor">
                                                        Remove from watch list <i class="fa fa-min" aria-hidden="true"></i>
                                                    </a>
                                                @endif
                                            @endif
                                        @endauth
                                    </div>
                                </li>
                                <li class="col-md-9">
                                    <div class="card text-white bg-transparent">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $data->description }}</h5>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <br>
                <hr>
                <div class="row">
                    <div class="col-sm-12 overflow-hidden">
                        <div class="iq-main-header d-flex align-items-center justify-content-between">
                            <h4 class="main-title">Actors</h4>
                        </div>
                        <div class="favorites-contens">
                            <ul class="favorites-slider list-inline  row p-0 mb-0">
                                @foreach ($data->character as $key => $value)
                                    <li class="slide-item">
                                        <div class="card text-white bg-transparent">
                                            <a href="{{ route('actor_detail', $value->actor->id) }}">
                                                <img src="{{ asset('images/actors/' . $value->actor->image) }}"
                                                    height="400" width="40" class="card-img-top img" alt="Card image">
                                            </a>
                                            <div class="card-body">
                                                <a href="{{ route('actor_detail', $value->actor->id) }}">
                                                    <h5 class="card-title">{{ $value->actor->name }}</h5>
                                                </a>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p>{{ $value->play_as }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12 overflow-hidden">
                        <form action="{{ route('home') }}" method="GET">
                            <div class="iq-main-header d-flex align-items-center justify-content-between">
                                <h4 class="main-title">More</h4>
                            </div>
                        </form>
                        <div class="favorites-contens">
                            <ul class=" row p-0 mb-0">
                                @foreach ($movies as $key => $value)
                                    <li class="slide-item">
                                        <div class="card text-white bg-transparent">
                                            <a href="{{ route('movie_detail', $value->id) }}">
                                                <img src="{{ asset('images/thumbnail/' . $value->thumbnail) }}"
                                                    height="400" style="max-width: 400px;" class="card-img-top img" alt="Card image"></a>
                                            <div class="card-body">
                                                <a href="{{ route('movie_detail', $value->id) }}">
                                                    <h5 class="card-title">
                                                        @if (strlen($value->title) <= 20)
                                                            {{ $value->title }}
                                                        @else
                                                            {{ substr($value->title, 0, 20) }}...
                                                        @endif
                                                    </h5>
                                                </a>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p>{{ date('Y', strtotime($value->release_date)) }}</p>
                                                    </div>
                                                    <div class="col-md-6 text-right">
                                                        @auth
                                                            @if (auth()->user()->role == 1)

                                                                <a href="#">
                                                                    @if (auth()->user()->watch_list->where('movie_id', $value->id)->count() == 1)
                                                                        <i class="fa fa-check" style="color: green"
                                                                            aria-hidden="true"></i>
                                                                    @else
                                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                                    @endif
                                                                </a>
                                                            @endif
                                                        @endauth
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
