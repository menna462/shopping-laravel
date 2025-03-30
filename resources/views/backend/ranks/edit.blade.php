@extends('backend.admindashboard')

@section('main')
<div class="container">
    <h2>Edit Rank</h2>
    <form action="{{ route('ranks.update', $rank->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Rank Name</label>
            <input type="text" name="name" class="form-control" value="{{ $rank->name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Points</label>
            <input type="number" name="points" class="form-control" value="{{ $rank->points }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Maximum Points</label>
            <input type="text" name="gift" class="form-control" value="{{ $rank->gift }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
