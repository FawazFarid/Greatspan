@extends('layouts.master')

@section('title')
    New Employee
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
    			    <h3 class="page-header"><i class="fa fa fa-user"></i>Employee</h3>
    			    <ol class="breadcrumb">
    				    <li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
    				    <li><i class="fa fa-users"></i><a href="{{ route('employee.list') }}">Employees</a></li>
    				    <li><i class="fa fa-plus"></i>Create Employee</li>
    			    </ol>
    		    </div>
            </div>
            <!-- content start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                             Employee Form
                        </header>
                        <div class="panel-body">
                            <form class="form-horizontal " method="post">
                                <div class="form-group {{ $errors->has('id_no') ? 'has-error' : '' }}">
                                    <label class="col-sm-2 control-label">ID No *</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="id_no" value="{{ Request::old('id_no')}}">
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                                    <label class="col-sm-2 control-label">First Name *</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="first_name" value="{{ Request::old('first_name')}}">
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('middle_name') ? 'has-error' : '' }}">
                                    <label class="col-sm-2 control-label">Middle Name *</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="middle_name" value="{{ Request::old('middle_name')}}">
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                                    <label class="col-sm-2 control-label">Last Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="last_name" value="{{ Request::old('last_name')}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Gender</label>
                                    <div class="col-sm-5">
                                        <select class="form-control m-bot15" name="gender">
                                              <option value="Male">Male</option>
                                              <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Address</label>
                                    <div class="col-sm-10">
                                          <input type="text" class="form-control" name="address" value="{{ Request::old('address')}}" >
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Home Phone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="phone_home" value="{{ Request::old('phone_home')}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Office Phone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="phone_office" value="{{ Request::old('phone_office')}}">
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="email" value="{{ Request::old('email')}}" >
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
                                    <label class="col-sm-2 control-label">Role</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="role" value="{{ Request::old('role')}}" >
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('salary') ? 'has-error' : '' }}">
                                    <label class="col-sm-2 control-label">Salary</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="salary" value="{{ Request::old('salary')}}" >
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('hire_date') ? 'has-error' : '' }}">
                                    <label class="col-sm-2 control-label">Hire Date</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="hire_date" value="{{ Request::old('hire_date')}}" >
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