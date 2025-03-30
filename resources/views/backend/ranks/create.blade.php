@extends('backend.admindashboard')
@section('main')
<div class="container">
    <h2>Add New Rank</h2>

    <form action="{{ route('ranks.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Rank Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Minimum Points</label>
            <input type="number" name="min_points" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Maximum Points</label>
            <input type="number" name="max_points" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Gift</label>
            <input type="text" name="gift" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Add</button>
    </form>
</div>

@endsection
