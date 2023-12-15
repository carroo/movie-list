@extends('layouts.auth')

@section('content')
    <section class="sign-in-page">
        <div class="container">
            <div class="row justify-content-center align-items-center height-self-center">
                <div class="col-lg-5 col-md-12 align-self-center">
                    <div class="sign-user_card ">
                        <div class="sign-in-page-data">
                            <div class="sign-in-from w-100 m-auto">
                                <h3 class="mb-3 text-center">Sign up</h3>
                                <form class="mt-4" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="name" name="name"
                                            class="form-control mb-0 @error('name') is-invalid @enderror" id="name"
                                            value="{{ old('name') }}" placeholder="Enter Name" autocomplete="off"
                                            required>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email"
                                            class="form-control mb-0 @error('email') is-invalid @enderror" id="email"
                                            value="{{ old('email') }}" placeholder="Enter email" autocomplete="off"
                                            required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password"
                                            class="form-control mb-0 @error('password') is-invalid @enderror" id="password"
                                            placeholder="Password" required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation"
                                            class="form-control mb-0 @error('password') is-invalid @enderror" id="password"
                                            placeholder="Password confirmation" required autocomplete="new-password">
                                    </div>

                                    <div class="sign-info">
                                        <button type="submit" class="btn btn-block btn-hover">Sign up</button>
                                    </div>

                                </form>

                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="d-flex justify-content-center links">
                                Already have an account? <a href="{{ route('login') }}" class="text-primary ml-2">Sign In</a>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

