@extends('layouts.app')

@section('content')
<div class="container">
    <div class="clearfix">
        @if (!empty($dataset) && count($dataset) > 0)
        <div class="table-responsive">
            <table class="table table-bordered tbl_thin" id="check">
                <tr class="bg-info">
                    <th class="text-center" style="width: 3%;">SL</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th class="text-center" style="width: 25%;">Actions</th>
                   
                </tr>
                <?php $sl = 0; ?>
                @foreach ($dataset as $data)
                <?php $sl++; ?>
                <tr onmouseover="change_color(this, true)" onmouseout="change_color(this, false)">
                    <td class="text-center">{{ $sl }}</td>
                    <td>{{ $data->name ?? '' }}</td>
                    <td>{{ $data->email ?? '' }}</td>
                   
                  
                    <td class="text-center">
                        <a class="btn btn-warning btn-xs" href="{{ url('/user/'.$data->id.'/access') }}">Access Control</a>
                    </td>
                    
                </tr>
                @endforeach
            </table>
        </div>
        @else
        <div class="alert alert-info">No records found!</div>
        @endif
    </div>
   
</div>
@endsection

@section('page_script')

@endsection
</div>


