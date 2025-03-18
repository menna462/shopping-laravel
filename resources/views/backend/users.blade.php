@extends('backend.admindashboard')
@section('main')
<div class="container">
    <div class="row">
        <div class="col-md-12 m-auto pt-5">
            <div class="card">
                <div class="card-header">
                  Users -{{$users ->count()}}
                </div>
                <div class="card-body">
                    @if (session('message1'))
                    <h4 class="alert alert-success text-center">{{ session('message1') }}</h4>
                    @endif
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Email</td>
                                <th>Role</th>
                                <th>Point</th>
                                <td>Operation</td>
                                <td>Rank</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{ $item->role }}</td> <!-- عرض الدور -->
                                <td>{{ $item->point }}</td>
                                <td> {{ $item->rank }}</td>
                                <td>
                                    <a href={{ route('user.show', $item->id) }} class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
                                    <a href={{route('user.edit', $item->id)}} class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href={{ route('user.delete', $item->id) }} class="btn btn-success">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
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

