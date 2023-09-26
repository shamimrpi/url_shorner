@extends('layouts.app')


@section('content')
<div class="clearfix">
    <div class="panel panel-info no_bdr_rad" style="margin: 0">
        <div class="panel-heading no_bdr_rad">

            <h3 class="panel-title text-center">
                Access Items Of <strong>{{ $user->name }}</strong> 
               
            </h3>
        </div>
    </div>
</div>

<div class="clearfix">
    <div class="container">
        {!! Form::open(['method' => 'POST', 'url' => 'user/acess/update', 'id' => 'frmUserAccessControl']) !!}
        <input type="hidden" name="user_id" value="{{ $user->id }}">

        <div class="panel panel-default no_bdr_rad">
           
            <div class="panel-body no_pad">
                @foreach (module_permission() as $_key => $_item)
               
                <li class="list-group-item access_item" style="float: left;width: 25%;">
                    <label>
                        <input type="checkbox" class="module_item" name="access[{{ $_key }}]" value="{{ $_item }}"  @if(array_key_exists($_key, $permissions)) {{ ' checked' }} @endif> {{ $_item }}
                    </label>
                </li>
               
                @endforeach
            </div>
        </div>
   
    
        <div class="text-center" style="margin-top: 15px;">
            <div class="form-group">
                <button type="submit" class="btn btn-primary mt-5">Save</button>
            </div>
        </div>
        {!! Form::close() !!}-
    </div>
    </div>


<script type="text/javascript">
    $(document).ready(function () {
        if ($("#access_list input[type='checkbox']:checked").length > 0) {
            $("#check_all").prop('checked', true);
        }

        $(document).on("change", "#check_all", function () {
            if (this.checked) {
                $("input[type='checkbox']").prop('checked', true);
            } else {
                $("input[type='checkbox']").prop('checked', false);
            }
        });

        $(document).on("change", ".module_heading", function () {
            var _div = $(this).attr('data-rel');
            if (this.checked) {
                $("." + _div + " .module_item").prop('checked', true);
            } else {
                $("." + _div + " .module_item").prop('checked', false);
            }
        });

        $(document).on("change", ".module_item", function () {
            var _div = $(this).attr('data-rel');
            if ($("." + _div + " .module_item:checked").length > 0) {
                $("#heading_" + _div).prop('checked', true);
            } else {
                $("#heading_" + _div).prop('checked', false);
            }
        });
    });
</script>
@endsection
