@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h2>Your Shortened URLs</h2>
        @if(!empty($urls) && count($urls) > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Original URL</th>
                        <th>Shortened URL</th>
                        <th>Clicks</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($urls as $url)
                        <tr>
                            <td>{{ $url->long_url }}</td>
                            <td><a href="{{ url($url->short_code) }}" target="_blank">{{ $url->short_code }}</a></td>
                            <td>{{ $url->clicks }}</td>
                            <td style="display: flex; align-items: center; gap: 10px;">
                                @if(has_user_access('url_edit'))
                                <a href="{{ route('url.edit',$url->id)  }}" class="btn btn-sm btn-info">Edit</a>
                                @endif
                                @if(has_user_access('url_show'))
                                <a href="{{ route('url.show',$url->id)  }}" class="btn btn-sm btn-success">Show</a>
                                @endif
                                @if(has_user_access('url_delete'))
                                    <form action="{{ route('url.destroy', $url->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm mt-3" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endsection
    @else
        <div class="alert alert-info">No records found!</div>
    @endif
</div>
