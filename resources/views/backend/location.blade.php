@extends('backend.admindashboard')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-md-12 m-auto pt-5">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        Locations - {{$locations ->count()}}
                    </div>
                  <a href=  {{route('location.create')}}  class="btn btn-success"> Create New Product</a>

                </div>
                <div class="card-body">
                    @if (session('message2'))
                    <h4 class="alert alert-success text-center">{{ session('message2') }}</h4>
                    @endif
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <td>id</td>
                                <td>Image</td>
                                <td>description</td>
                                <td>Operation</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($locations as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>
                                    <img src={{asset('img/location/'.$item->loc_img)}} style="width:60px">
                                </td>
                                <td>{{$item->description}}</td>
                                <td>
                                    <a href={{ route('location.show', $item->id) }} class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
                                    <a href={{route('location.edit', $item->id)}} class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href={{ route('location.delete', $item->id) }} class="btn btn-success">
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
</div>@endsection

