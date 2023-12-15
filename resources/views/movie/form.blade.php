@extends('layouts.temp')

@section('content')
    <div class="main-content">
        <section id="iq-favorites">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 overflow-hidden">
                        <div class="iq-main-header d-flex align-items-center justify-content-between">
                            <h4 class="main-title">Add new movie</h4>

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
                            <form action="{{ route('movie_add') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ $data->title ?? '' }}"
                                        required>
                                    @isset($data)
                                        <input type="hidden" name="id" value="{{ $data->id }}">
                                    @endisset
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Description</label>
                                    <textarea class="form-control" name="description"
                                        rows="3">{{ $data->description ?? '' }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Genre</label>
                                    <select required style="width: 100%;" class="form-control selectpicker" name="genre[]"
                                        multiple="multiple">
                                        @foreach ($grs as $key => $value)
                                            <option value="{{ $value->id }}" @isset($data) @if ($data->genre->where('gr_id', $value->id)->count() == 1) selected @endif @endisset>{{ $value->genre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div id="act">
                                    <label for="" class="form-label">Actor</label>
                                    <div class="input-group mb-1" style="width: 100%">
                                        <select required class="form-control" name="actor_id[]">
                                            <option value="">Chose</option>
                                            @foreach ($actors as $key => $value)
                                                <option value="{{ $value->id }}" @isset($data) @if ($data->character[0]->actor_id == $value->id) selected @endif @endisset>{{ $value->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <input required type="text" class="form-control" name="play_as[]"
                                            placeholder="Play As" value="{{ $data->character[0]->play_as ?? '' }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-success" type="button" id="more_actor">
                                                more <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @isset($data)
                                        @foreach ($data->character as $k => $v)
                                            @if ($k != 0)
                                                <div class="input-group mb-1" style="width: 100%">
                                                    <select required class="form-control" name="actor_id[]">
                                                        <option value="">Chose</option>
                                                        @foreach ($actors as $key => $value)
                                                            <option value="{{ $value->id }}" @isset($data) @if ($v->actor_id == $value->id) selected @endif @endisset>
                                                                {{ $value->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <input required type="text" class="form-control" name="play_as[]"
                                                        placeholder="Play As" value="{{ $v->play_as ?? '' }}">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-danger less_actor" type="button"
                                                            id="less_actor">
                                                            delete
                                                        </button>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endisset
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="" class="form-label">Director</label>
                                    <input type="text" class="form-control" name="director"
                                        value="{{ $data->director ?? '' }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Release date</label>
                                    <input type="date" class="form-control" name="release_date"
                                        value="{{ $data->release_date ?? '' }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Thumbnail @isset($data) (optional) @endisset </label>
                                    <input type="file" class="form-control" name="thumbnail">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Background @isset($data) (optional) @endisset </label>
                                    <input type="file" class="form-control" name="background">
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
    <div id="t" style="display: none">
        <div class="input-group mb-1" style="width: 100%">
            <select required class="form-control" name="actor_id[]">
                <option value="">Chose</option>
                @foreach ($actors as $key => $value)
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                @endforeach
            </select>
            <input required type="text" class="form-control" name="play_as[]" placeholder="Play As">
            <div class="input-group-append">
                <button class="btn btn-outline-danger less_actor" type="button" id="less_actor">
                    delete
                </button>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function() {
            var i = 0;
            $('#more_actor').click(function() {
                $("#act").append($('#t').html());
            });
            $("#act").on("click", ".less_actor", function() {
                $(this).parent().parent().remove();
            });
        });

    </script>
@endsection
