@extends('layouts.temp')

@section('content')
    <div class="main-content">
        <section id="iq-favorites">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 overflow-hidden">
                        <div class="iq-main-header d-flex align-items-center justify-content-between">
                            <h4 class="main-title">Add new actor</h4>

                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="favorites-contens">
                            <form action="{{ route('actor_add') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $data->name ?? '' }}"
                                        required>
                                    @isset($data)
                                        <input type="hidden" name="id" value="{{ $data->id }}">
                                    @endisset
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Gender</label>
                                    <select required style="width: 100%;" class="form-control" name="gender">
                                        <option value="">Choose</option>
                                        <option value="male" @isset($data) @if ($data->gender == "male") selected @endif @endisset>male
                                        </option>
                                        <option value="female" @isset($data) @if ($data->gender == "female") selected @endif @endisset>female
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Biography</label>
                                    <textarea class="form-control" name="biography"
                                        rows="3">{{ $data->biography ?? '' }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" name="dob"
                                        value="{{ $data->dob ?? '' }}" required>
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="" class="form-label">Place of Birth</label>
                                    <input type="text" class="form-control" name="pob"
                                        value="{{ $data->pob ?? '' }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Image @isset($data) (optional) @endisset </label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="" class="form-label">Popularity</label>
                                    <input type="number" class="form-control" name="popularity"
                                        value="{{ $data->popularity ?? '' }}" required>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-block btn-danger" type="submit">
                                        @isset($data)
                                            update <i class="fa fa-plus" aria-hidden="true"></i>
                                        @else
                                            Create <i class="fa fa-plus" aria-hidden="true"></i>
                                        @endisset
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
@section('script')
    <script>

    </script>
@endsection
