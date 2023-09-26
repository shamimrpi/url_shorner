@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Shorten a URL</h2>
    <form action="{{ route('url.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="long_url">Enter Long URL:</label>
            <input type="url" class="form-control" id="long_url" name="long_url" required>
            <div class="text-danger">{{ $errors->first('long_url') }}</div>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Create</button>
    </form>
</div>
@endsection