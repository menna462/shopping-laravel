@extends('backend.admindashboard')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-12 m-auto pt-5">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            Ranks - {{ $ranks->count() }}
                        </div>
                        <a href="{{ route('ranks.create') }}" class="btn btn-success">Create New Rank</a>
                    </div>
                    <div class="card-body">
                        @if (session('message'))
                            <h4 class="alert alert-success text-center">{{ session('message') }}</h4>
                        @endif
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Points</th>
                                    <th>Gift</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ranks as $rank)
                                    <tr>
                                        <td>{{ $rank->id }}</td>
                                        <td>{{ $rank->name }}</td>
                                        <td>{{ $rank->points }}</td>
                                        <td>{{ $rank->gift}}</td>
                                        <td>
                                            <a href="{{ route('ranks.edit', $rank->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('ranks.destroy', $rank->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
