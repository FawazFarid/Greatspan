@extends('layouts.master')

@section('title')
    Driver Profile
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
			    <h3 class="page-header"><i class="fa fa fa-user"></i>Driver Profile</h3>
			    <ol class="breadcrumb">
				    <li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
				    <li><i class="fa fa-users"></i><a href="{{ route('driver.list') }}">Drivers</a></li>
				    <li><i class="fa fa-file"></i>Driver Profile</li>
			    </ol>
		    </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <a class="btn btn-primary" href="{{ route('driver.edit', ['id' => $driver->id]) }}"><span class="icon_pencil"></span> Edit Driver</a>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-sm-12">
              <section class="panel">
                  <header class="panel-heading">
                      Driver Details
                  </header>
                  <table class="table table-striped">
                      <tbody>
                          <tr>
                              <td>Name</td>
                              <td><span style="font-size:14px; color:#000;"><strong>{{ $driver->name }}</strong></td>
                          </tr>
                          <tr>
                              <td>ID</td>
                              <td>{{ $driver->id_no }}</td>
                          </tr>
                          <tr>
                              <td>Phone</td>
                              <td>{{ $driver->phone }}</td>
                          </tr>
                          <tr>
                              <td>Company</td>
                              <td>{{ $driver->company }}</td>
                          </tr>
                      </tbody>
                    </table>
              </section>
            </div>
        </div>
    </section>
</section>
@endsection