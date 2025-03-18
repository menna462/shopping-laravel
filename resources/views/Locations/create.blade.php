@extends('backend.admindashboard')
@section('main')
<div class="container">
    <div class="row">
        <div class="col-md-10 m-auto">
            <form action="{{route('location.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="">ID</label>
                <input type="hidden" class="form-control" name="id">
                @error('id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="">Img</label>
                <input type="file" class="form-control" name="loc_img">
                @error('loc_img')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="">Description</label>
                <input type="text" class="form-control" name="description">
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror



                <input type="submit" class="btn btn-success btn-block mt-5" value="Create New Product">
            </form>

        </div>
    </div>
</div>
@endsection
