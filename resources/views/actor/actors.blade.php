@extends('layouts.temp')

@section('content')
    <div class="main-content">
        <section id="iq-favorites">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 overflow-hidden">
                        <br>
                        <form action="{{ route('actors') }}" method="GET">
                            <div class="iq-main-header d-flex align-items-center justify-content-between">
                                <h4 class="main-title">Actors</h4>
                                <div class="input-group" style="width: 50%">
                                    <input type="text" class="form-control" name="key" value="{{ $_GET['key'] ?? '' }}"
                                        placeholder="Type anything">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                                            Find
                                        </button>
                                    </div>
                                    @auth
                                        @if (auth()->user()->role == 0)
                                            <div class="input-group-append">
                                                <a href="{{ route('actor_form') }}" class="btn btn-outline-success">
                                                    add new actors
                                                </a>
                                            </div>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="row">
                            @foreach ($actors as $key => $value)
                                <div class="col-md-3">
                                    <div class="card text-white bg-transparent">
                                        <a href="{{ route('actor_detail', $value->id) }}">
                                            <img src="{{ asset('images/actors/' . $value->image) }}" height="330"
                                                width="40" class="card-img-top img" alt="Card image">
                                        </a>
                                        <div class="card-body">
                                            <a href="{{ route('actor_detail', $value->id) }}">
                                                <h5 class="card-title">{{ $value->name }}</h5>
                                            </a>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p>
                                                        @foreach ($value->character as $k => $v)
                                                            {{ $v->movie->title, 0, 10 }}
                                                        @endforeach
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center">
                            {{ $actors->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
