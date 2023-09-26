@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Shorten a URL</h2>
    <form action="{{ route('url.update',$url->id) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="long_url">Enter Long URL:</label>
            <input type="url" class="form-control" value="{{$url->long_url}}" id="long_url" name="long_url" required>
            <div class="text-danger">{{ $errors->first('long_url') }}</div>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Update</button>
    </form>
</div>
@endsection