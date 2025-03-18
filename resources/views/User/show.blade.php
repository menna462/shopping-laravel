@extends('backend.admindashboard')
@section('main')
<div class="container">
    <div class="row">
      <div class="col-md-8 m-auto">
        <h3 class="text-center mb-3">Details of product <span class="badge badge-primary">1</span> </h3>
        <table class="table table-dark">
          <thead>
            <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>email_verified_at</td>
                    <td>Password</td>
                    <td>Operation</td>
            </tr>
          </thead>
          <tbody>
              <tr>
                  <td> {{$result->id}} </td>
                  <td> {{$result->name}} </td>
                  <td>{{$result->email}}</td>
                  <td> {{$result->email_verified_at}} </td>
                  <td>{{$result->password}}</td>
                  <td>
                  <a href="{{ route('users') }}" class="btn btn-success">
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
