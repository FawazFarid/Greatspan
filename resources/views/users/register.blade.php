@extends('layouts.master')
@section('title')
    Register User
@endsection

@section('header')
    @include('includes.header')
@endsection

@section('sidebar')
    @include('includes.sidebar')
@endsection

@section('main-content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                @include('includes.notifications.message-block')
    		    <div class="col-lg-12">
    			    <h3 class="page-header"><i class="fa fa fa-user"></i>Consignee</h3>
    			    <ol class="breadcrumb">
    				    <li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
    				    <li><i class="fa fa-users"></i><a href="{{ route('user.list') }}">Users</a></li>
    				    <li><i class="fa fa-plus"></i>Register User</li>
    			    </ol>
    		    </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <section class="panel">
                        <header class="panel-heading">
                             Consignee Form
                        </header>
                        <div class="panel-body">
                            <form class="form-horizontal " method="post">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label class="col-sm-2 control-label">Name *</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" value="{{ Request::old('name')}}">
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label class="col-sm-2 control-label">Email *</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="email" value="{{ Request::old('email')}}" >
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <label class="col-sm-2 control-label">Password *</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password" value="{{ Request::old('password')}}" >
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('password_confrim') ? 'has-error' : '' }}">
                                    <label class="col-sm-2 control-label">Password Confirm *</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password_confirmation" value="{{ Request::old('password_confirmation')}}" >
                                    </div>
                                </div>
                                <input type="hidden" name="_token" value="{{ Session::token() }}" />
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-sm-3">
                                        <button type="submit" class="btn btn-block  btn-info"><i class="fa fa-save"></i> Save</button>
                                    </div>
                                </div>
                            </form>
                          </div>
            </div>
        </section>
    </section>
@endsection