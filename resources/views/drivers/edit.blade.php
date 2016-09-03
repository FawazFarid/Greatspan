@extends('layouts.master')

@section('title')
    Edit Driver
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
    			    <h3 class="page-header"><i class="fa fa fa-pencil"></i>Edit Driver</h3>
    			    <ol class="breadcrumb">
    				    <li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
    				    <li><a href="{{ route('driver.list') }}"><i class="fa fa-users"></i>Drivers</a></li>
    				    <li><i class="fa fa-pencil"></i>Edit Driver</li>
    			    </ol>
    		    </div>
            </div>
            <!-- content start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                             Edit Driver Form
                        </header>
                        <div class="panel-body">
                            <form class="form-horizontal " method="post">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label class="col-sm-2 control-label">Name *</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" value="{{ $driver->name }}">
                                    </div>
                                </div>
                                
                                <div class="form-group {{ $errors->has('id') ? 'has-error' : '' }}">
                                    <label class="col-sm-2 control-label">ID *</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="id_no" value="{{ $driver->id_no }}">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="phone" value="{{ $driver->phone }}">
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label class="col-sm-2 control-label">Company</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="company" value="{{ $driver->company }}" >
                                    </div>
                                </div>
                                <input type="hidden" name="_token" value="{{ Session::token() }}" />
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-sm-3">
                                        <button type="submit" class="btn btn-block  btn-info"><i class="fa fa-save"></i> Save</button>
                                    </div>
                                </div>
                                
                                <input type="hidden" name="user">
                                <input type="hidden" name="driver_id" value="{{ $driver->id }}">
                            </form>
                          </div>
                    </section>
                </div>
            </div>
            <!-- content end-->
        </section>
    </section>
@endsection