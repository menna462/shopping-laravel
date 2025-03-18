@extends('backend.admindashboard')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-md-8 m-auto">
            <h3 class="text-center mb-3">Details of product <span class="badge badge-primary">{{ $location->id }}</span></h3>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Img</th>
                        <th>Description</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $location->id }}</td>
                        <td>
                            <img src="{{ asset('img/location/' . $location->loc_img) }}" style="width:60px" alt="Location Image">
                        </td>
                        <td>{{ $location->description }}</td>
                        <td>
                            <a href="{{ route('locations') }}" class="btn btn-success">
                                <i class="fa-solid fa-house"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
