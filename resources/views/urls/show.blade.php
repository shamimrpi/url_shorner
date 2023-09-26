@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Shortened URL</h2>
    <p><strong>Original URL:</strong> {{ $url->long_url }}</p>
    <p><strong>Shortened URL:</strong> <a href="{{ url($url->short_code) }}" target="_blank">{{ url($url->short_code) }}</a></p>
</div>
@endsection