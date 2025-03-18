@extends('backend.admindashboard')
@section('main')
<div class="container">
    <div class="row">
        <div class="col-md-10 m-auto">
            <form action="{{ route('user.update') }}" method="Post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="old_id" value= {{$result->id}} >

                <label for="">ID</label>
                <input type="hidden" name="id" value="{{$result->id}}">
                @error('id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="">Name</label>
                <input type="text" class="form-control" name="name" value= {{$result->name}} >
                @error('name') <!-- تم تعديل الحقل إلى name -->
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="">Email</label>
                <input type="text" class="form-control" name="email" value= {{$result->email}} >
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" value= {{$result->password}} >
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                
                <label for="role">Role</label>
                <select name="role" class="form-control">
                    <option value="user" {{ $result->role == 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ $result->role == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
                @error('role')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="submit" class="btn btn-success btn-block mt-5" value="Create New User">
            </form>
        </div>
    </div>
</div>
@endsection
