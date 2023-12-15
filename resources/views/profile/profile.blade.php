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
                                <li class="col-md-4">
                                    <div class="card text-white bg-transparent">
                                        <img src="{{ asset('images/user/' . $data->image) }}" height="350" width="350"
                                            class="rounded-circle" alt="User image">
                                        <div class="card-body">
                                            <h3 class="card-title">{{ $data->name }}</h3>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h6>{{ $data->email }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="col-md-8">
                                    <div class="card text-white bg-transparent">
                                        <form action="{{ route('profile_update') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-header">
                                                <h3 class="card-title">Update profile</h3>
                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Name</label>
                                                    <input type="text" class="form-control" name="name"
                                                        value="{{ $data->name }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Email</label>
                                                    <input type="email" class="form-control" name="email"
                                                        value="{{ $data->email }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Day Of Birth</label>
                                                    <input type="date" class="form-control" name="dob"
                                                        value="{{ $data->dob }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Phone</label>
                                                    <input type="text" class="form-control" name="phone"
                                                        value="{{ $data->phone }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Image profile (optional)</label>
                                                    <input type="file" class="form-control" name="image">
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button class="btn btn-block btn-danger" type="submit">
                                                    Save Changes
                                                </button>
                                            </div>
                                        </form>
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
