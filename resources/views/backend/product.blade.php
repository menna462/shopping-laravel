@extends('backend.admindashboard')

@section('main')
<div class="container">
    <div class="row">

        <div class="col-md-12 m-auto pt-5">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        Product - {{$products ->count()}}
                    </div>
                  <a href={{route('product.create')}} class="btn btn-success"> Create New Product</a>
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
                                <td>name</td>
                                <td>description</td>
                                <td>price</td>
                                <td>quantity</td>
                                <td>Operation</td>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>
                                    <img src={{asset('img/products/'.$item->cate_img)}} style="width:60px">
                                </td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->quantity}}</td>

                                <td>
                                    <a href={{ route('product.show', $item->id) }} class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
                                    <a href={{route('product.edit', $item->id)}} class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href={{ route('product.delete', $item->id) }} class="btn btn-success">
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
