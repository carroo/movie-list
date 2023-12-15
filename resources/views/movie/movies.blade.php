@extends('layouts.temp')

@section('content')
    <!-- Slider End -->
    <!-- MainContent -->
    <div class="main-content">
        <section id="iq-favorites">
            <div class="container-fluid">
                <hr>
                <div class="row">
                    <div class="col-sm-12 overflow-hidden">
                        <form action="{{ route('movies') }}" method="GET">
                            <div class="iq-main-header d-flex align-items-center justify-content-between">
                                <h4 class="main-title">Show</h4>
                                <div class="input-group" style="width: 30%">
                                    <input type="text" class="form-control" name="key" value="{{ $_GET['key'] ?? '' }}"
                                        placeholder="Type anything">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                                            Find
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="iq-main-header d-flex ">
                            <a href="{{ route('movies') }}?gr=0&filter={{ $f }}" class="btn btn-sm @if ($g==0) btn-outline-success @else btn-outline-secondary @endif btn-rounded mr-4" type="button" id="button-addon2">
                                All
                            </a>
                            @foreach ($gr as $key => $value)
                                <a href="{{ route('movies') }}?gr={{ $value->id }}&filter={{ $f }}"
                                    class="btn btn-sm @if ($g==$value->id) btn-outline-success @else btn-outline-secondary @endif
                                    btn-rounded mr-4" type="button" id="button-addon2">
                                    {{ $value->genre }}
                                </a>
                            @endforeach
                        </div>
                        <div class="iq-main-header">
                            <a href="{{ route('movies') }}?gr={{ $g }}&filter=1" class="btn @if ($f==1) btn-outline-success @else btn-outline-secondary @endif btn-rounded mr-4" type="button" id="button-addon2">
                                Latest
                            </a>
                            <a href="{{ route('movies') }}?gr={{ $g }}&filter=2" class="btn @if ($f==2) btn-outline-success @else btn-outline-secondary @endif btn-rounded mr-4" type="button" id="button-addon2">
                                A-Z
                            </a>
                            <a href="{{ route('movies') }}?gr={{ $g }}&filter=3" class="btn @if ($f==3) btn-outline-success @else btn-outline-secondary @endif btn-rounded mr-4" type="button" id="button-addon2">
                                Z-A
                            </a>
                            @auth
                                @if (auth()->user()->role == 0)
                                    <div class="pull-right">
                                        <a href="{{ route('movie_form') }}" class="btn btn-danger btn-rounded text-right"
                                            type="button" id="button-addon2">
                                            <i class="fa fa-plus" aria-hidden="true"></i> add new movie
                                        </a>
                                    </div>
                                @endif
                            @endauth
                        </div>
                        <hr>
                        <div class="favorites-contens">
                            <ul class=" row p-0 mb-0">
                                @foreach ($movies as $key => $value)
                                    <li class="slide-item">
                                        <div class="card text-white bg-transparent">
                                            <a href="{{ route('movie_detail', $value->id) }}">
                                                <img src="{{ asset('images/thumbnail/' . $value->thumbnail) }}"
                                                    height="400" style="max-width: 400px;"  class="card-img-top img" alt="Card image"></a>
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

                                                                <a href="{{ route('watch_lists_add',$value->id) }}">
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
