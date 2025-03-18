@extends('backend.admindashboard')
@section('main')
<div class="container">
    <div class="row">
      <div class="col-md-8 m-auto">
        <h3 class="text-center mb-3">Details of product <span class="badge badge-primary">1</span> </h3>
        <table class="table table-dark">
          <thead>
            <tr>
            <td>id</td>
              <td>name</td>
             <td>description</td>
              <td>price</td>
              <td>quantity</td>
              <td>Operation</td>

            </tr>
          </thead>
          <tbody>
              <tr>
                  <td> {{$result->id}} </td>
                  <td> {{$result->name}} </td>
                  <td>{{$result->description}}</td>
                  <td> {{$result->price}} </td>
                  <td>{{$result->quantity}}</td>
                  <td>
                  <a href="{{ route('products') }}" class="btn btn-success">
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
