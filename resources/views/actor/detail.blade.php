@extends('layouts.temp')

@section('content')
    <!-- Slider End -->
    <!-- MainContent -->
    <br>
    <div class="main-content">
        <section id="iq-favorites">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 overflow-hidden">
                        <div class="favorites-contens">
                            <ul class="row p-0 mb-0">
                                <li class="col-md-3">
                                    <div class="card text-white bg-transparent">
                                        <img src="{{ asset('images/actors/' . $data->image) }}" height="350" width="40"
                                            class="card-img-top img" alt="Card image">
                                        <div class="card-body">
                                            <h3 class="card-title">Personal Info</h3>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h6>Popularity</h6>
                                                    <p>{{ $data->popularity }}</p>
                                                    <h6>gender</h6>
                                                    <p>{{ $data->gender }}</p>
                                                    <h6>Birtday</h6>
                                                    <p>{{ date('d F Y', strtotime($data->dob)) }}</p>
                                                    <h6>Place Of Birth</h6>
                                                    <p>{{ $data->pob }}</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        @auth
                                            @if (auth()->user()->role == 0)
                                                <div class="col-md-6">
                                                    <a href="{{ route('actor_form_edit', $data->id) }}"
                                                        class="btn btn-block btn-outline-warning" type="button" id="more_actor">
                                                        Update <i class="fa fa-bars" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="{{ route('actor_delete', $data->id) }}"
                                                        class="btn btn-block btn-outline-danger" type="button" id="more_actor">
                                                        Delete <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            @else
                                            @endif
                                        @endauth
                                    </div>
                                </li>
                                <li class="col-md-9">
                                    <div class="card text-white bg-transparent">
                                        <div class="card-header">
                                            <h3 class="card-title">{{ $data->name }}</h3>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">biography</h5>
                                            <p>
                                                {{ $data->biography }}
                                            </p>
                                        </div>
                                        <div class="card-footer">
                                            <h4 class="card-title">Known For</h4>
                                            <div class="row">
                                                @foreach ($data->character as $key => $value)
                                                    <div class="col-md-3">
                                                        <div class="card text-white bg-transparent">
                                                            <a href="{{ route('movie_detail', $value->movie->id) }}">
                                                                <img src="{{ asset('images/thumbnail/' . $value->movie->thumbnail) }}"
                                                                    height="250" width="40" class="card-img-top img"
                                                                    alt="Card image"></a>
                                                            <div class="card-body">
                                                                <a href="{{ route('movie_detail', $value->movie->id) }}">
                                                                    <h5 class="card-title">{{ $value->movie->title }}</h5>
                                                                </a>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <p>{{ date('Y', strtotime($value->movie->release_date)) }}
                                                                        </p>

                                                                    </div>
                                                                    <div class="col-md-6 text-right">
                                                                        @auth
                                                                            @if (auth()->user()->role == 1)

                                                                                <a href="#">
                                                                                    @if (auth()->user()->watch_list->where('movie_id', $value->movie->id)->count() == 1)
                                                                                        <i class="fa fa-check"
                                                                                            style="color: green"
                                                                                            aria-hidden="true"></i>
                                                                                    @else
                                                                                        <i class="fa fa-plus"
                                                                                            aria-hidden="true"></i>
                                                                                    @endif
                                                                                </a>
                                                                            @endif
                                                                        @endauth
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
