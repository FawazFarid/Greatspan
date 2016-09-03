@extends('layouts.master')

@section('title')
    Employee Profile
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
			    <h3 class="page-header"><i class="fa fa fa-file"></i>Employee Profile</h3>
			    <ol class="breadcrumb">
				    <li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
				    <li><i class="fa fa-users"></i><a href="{{ route('employee.list') }}">Employees</a></li>
				    <li><i class="fa fa-file"></i>employee Profile</li>
			    </ol>
		    </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <a class="btn btn-primary" href="{{ route('employee.edit', ['id' => $employee->id]) }}"><span class="icon_pencil"></span> Edit Employee</a>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-sm-12">
              <section class="panel">
                  <header class="panel-heading">
                      Employee Details
                  </header>
                  <table class="table table-striped">
                      <tbody>
                          <tr>
                              <td>First Name</td>
                              <td><span style="font-size:14px; color:#000;"><strong>{{ $employee->first_name }}</strong></td>
                          </tr>
                          <tr>
                              <td>Middle Name</td>
                              <td><span style="font-size:14px; color:#000;"><strong>{{ $employee->middle_name }}</strong></td>
                          </tr>
                          <tr>
                              <td>Last Name</td>
                              <td><span style="font-size:14px; color:#000;"><strong>{{ $employee->last_name }}</strong></td>
                          </tr>
                          <tr>
                              <td>Gender</td>
                              <td>{{ $employee->gender }}</td>
                          </tr>
                          <tr>
                              <td>Address</td>
                              <td>{{ $employee->address }}</td>
                          </tr>
                          <tr>
                              <td>Home Phone</td>
                              <td>{{ $employee->phone_home }}</td>
                          </tr>
                          <tr>
                              <td>Office Phone</td>
                              <td>{{ $employee->phone_office }}</td>
                          </tr>
                          <tr>
                              <td>Email</td>
                              <td>{{ $employee->email }}</td>
                          </tr>
                          <tr>
                              <td>Role</td>
                              <td>{{ $employee->role }}</td>
                          </tr>
                          <tr>
                              <td>Salary</td>
                              <td>{{ $employee->salary }}</td>
                          </tr>
                          <tr>
                              <td>Hire Date</td>
                              <td>{{ $employee->hire_date }}</td>
                          </tr>
                      </tbody>
                </table>
              </section>
            </div>
        </div>
    </section>
</section>
@endsection