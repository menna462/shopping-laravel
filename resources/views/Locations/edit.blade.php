@extends('backend.admindashboard')
@section('main')
<div class="container">
    <div class="row">
        <div class="col-md-10 m-auto">
            <form action="{{route('location.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="old_id" value= {{$result->id}} >
                <label for="">ID</label>
                <input type="hidden" name="id" value="{{$result->id}}">
                @error('id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="">Img</label>
                <input type="file" class="form-control"  name="loc_img">
                @error('loc_img')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="">Description</label>
                <input type="text" class="form-control" value={{$result->description}} name="description">
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror





                <input type="submit" class="btn btn-success btn-block mt-5" value="Edit Product">
            </form>

        </div>
    </div>
</div>
@endsection
