@extends('layouts.master')

@section('title')
    New Consignee
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
    				    <li><i class="fa fa-users"></i><a href="{{ route('consignee.list') }}">Consignees</a></li>
    				    <li><i class="fa fa-plus"></i>Create Consignee</li>
    			    </ol>
    		    </div>
            </div>
            <!-- content start-->
            <div class="row">
                <div class="col-lg-12">
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
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Type</label>
                                    <div class="col-sm-5">
                                        <select class="form-control m-bot15" name="type">
                                              <option value="Company">Company</option>
                                              <option value="Individual">Individual</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="row">
                                          <label class="col-sm-2 control-label">Address</label>
                                          <div class="col-lg-5">
                                                <input type="text" class="form-control" name="address" value="{{ Request::old('address')}}" >
                                          </div>
                                          <label class="col-sm-1 control-label">Country</label>
                                            <div class="col-lg-4">
                                                <select class="form-control m-bot15" name="country">
                                                    <option value="Kenya">Kenya</option>
                                                    <option value="Tanzania">Tanzania</option>
                                                    <option value="Uganda">Uganda</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="phone" value="{{ Request::old('phone')}}">
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="email" value="{{ Request::old('email')}}" >
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
                    </section>
                </div>
            </div>
            <!-- content end-->
        </section>
    </section>
@endsection