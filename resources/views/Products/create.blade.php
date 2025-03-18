@extends('backend.admindashboard')
@section('main')
<div class="container">
    <div class="row">
        <div class="col-md-10 m-auto">
            <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="">ID</label>
                <input type="hidden" class="form-control" name="id">
                @error('id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="">Img</label>
                <input type="file" class="form-control" name="cate_img">
                @error('cate_img')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="">Name</label>
                <input type="text" class="form-control" name="name">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="">Description</label>
                <input type="text" class="form-control" name="description">
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="">Price</label>
                <input type="text" class="form-control" name="price">
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="">Quantity</label>
                <input type="text" class="form-control" name="quantity">
                @error('quantity')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <input type="submit" class="btn btn-success btn-block mt-5" value="Create New Product">
            </form>

        </div>
    </div>
</div>
@endsection
