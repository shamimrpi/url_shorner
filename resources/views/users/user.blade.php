@extends('layouts.app')
<?php

use App\Models\User;


?>
@section('content')
<div id="breadcrumbBar" class="breadcrumb site_nav_links no_bdr_rad clearfix">
    <div class="col-md-3 col-sm-3 col-xs-2 cxs_2 no_pad">
        <button class="btn btn-info btn-xs" type="button" onclick="history.back()" title="Go Back"><span class="visible-xs"><i class="fa fa-arrow-left"></i></span><span class="hidden-xs">Back</span></button>
        <button class="btn btn-info btn-xs" onclick="redirectTo('<?= url('view-clear') ?>')" title="Refresh" type="button"><span class="visible-xs"><i class="fa fa-refresh"></i></span><span class="hidden-xs">Refresh</span></button>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6 cxs_10 text-center">
        <h2 class="page-title">{{ $page_title }}</h2>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-4 cxs_12 no_pad">
        <ul class="text-right no_mrgn">
            <li><a href="{{ route('home') }}">Dashboard</a> <span class="fa fa-angle-right"></span></li>
            <li><a href="{{ url('/user') }}">User</a> <span class="fa fa-angle-right"></span></li>
            <li>Detail</li>
        </ul>
    </div>
</div>

<div class="user_information">
    <div class="row clearfix">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">User Information</div>
                <table class="table table-condensed">
                    <tr>
                        <th>Name:</th>
                        <th>{{ $user->name }}</th>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <th>{{ $user->email }}</th>
                    </tr>
                    <tr>
                        <th>Language:</th>
                        <th>{{ ($user->locale == 'bn') ? 'Bangla' : 'English' }}</th>
                    </tr>
                    <tr>
                        <th>Joined:</th>
                        <th>{{ $user->created_at }}</th>
                    </tr>
                    <tr>
                        <th>Created By:</th>
                        <th>{{ $user->createdBy->name ?? '' }}</th>
                    </tr>
                    <tr>
                        <th>Last Update:</th>
                        <th>{{ $user->updated_at }}</th>
                    </tr>
                    <tr>
                        <th>Updated By:</th>
                        <th>
                            <?php
                            if ($user->updated_by) {
                                echo User::get_user_info_by_id($user->updated_by)->name;
                            }
                            ?>
                        </th>
                    </tr>
                </table>
            </div>

            <div class="text-center">
                <a href="{{ url('/user/'.$user->_key.'/edit') }}" class="btn btn-primary">Edit</a>
            </div>
        </div>

        <div class="col-md-2">
            <div class="thumbnail">
                <?php $_avatar = user_avatar($user); ?>
                <img alt="{{ $user->name }}" class="img-responsive" src="{{ $_avatar }}" style="max-height: 170px">
            </div>
        </div>
    </div>
</div>
@endsection
