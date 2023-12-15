@extends('layouts.temp')

@section('content')
    <!-- Slider End -->
    <!-- MainContent -->
    <div class="main-content">
        <br><br>
        <section id="iq-favorites">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 overflow-hidden">
                        <div class="iq-main-header d-flex align-items-center justify-content-between">
                            <h4 class="main-title">My Watch lists</h4>
                        </div>
                        <div class="favorites-contens">
                            <div class="card text-white bg-transparent">
                                <div class="card-body">
                                    <table class="table table-hover">
                                        <thead class="bg-secondary">
                                            <tr>
                                                <th scope="col">Poster</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($watch_lists as $key => $value)

                                                <tr>
                                                    <th class="text-center"> <img
                                                            src="{{ asset('images/thumbnail/' . $value->movie->thumbnail) }}"
                                                            height="200" width="100" class="img-fluid" alt="Poster image">
                                                    </th>
                                                    <td class=" align-middle">{{ $value->movie->title }}</td>
                                                    <td class=" align-middle @if($value->status == "Planning") text-primary @elseif($value->status == "Watching") text-warning @elseif($value->status == "Finished") text-success @endif">
                                                        {{ $value->status }}
                                                    </td>
                                                    <td class=" align-middle"><button type="button"
                                                            class="btn btn-outline-secondary" data-toggle="modal"
                                                            data-target="#edit{{ $value->id }}">
                                                            Setting
                                                        </button>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="edit{{ $value->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content bg-dark">
                                                            <form action="{{ route('watch_lists_update') }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                        watch list
                                                                    </h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label for="" class="form-label">Status</label>
                                                                        <input type="hidden" value="{{ $value->id }}" name="id">
                                                                        <select required style="width: 100%;"
                                                                            class="form-control" name="status">
                                                                            <option value="Planning" @if($value->status == "planning") selected @endif>Planing</option>
                                                                            <option value="Watching" @if($value->status == "Watching") selected @endif>Watching</option>
                                                                            <option value="Finished" @if($value->status == "Finished") selected @endif>Finished</option>
                                                                            <option value="Remove">Remove</option>

                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('table').DataTable({
                dom: 'frtip'
            });
        });

    </script>
@endsection
