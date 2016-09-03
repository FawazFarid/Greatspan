@extends('layouts.master')

@section('title')
    Consignee Profile
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
			    <h3 class="page-header"><i class="fa fa fa-file"></i>Consignee Profile</h3>
			    <ol class="breadcrumb">
				    <li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
				    <li><i class="fa fa-users"></i><a href="{{ route('consignee.list') }}">Consignees</a></li>
				    <li><i class="fa fa-file"></i>Consignee Profile</li>
			    </ol>
		    </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <a class="btn btn-primary" href="{{ route('consignee.edit', ['id' => $consignee->id]) }}"><span class="icon_pencil"></span> Edit Consignee</a>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-sm-12">
              <section class="panel">
                  <header class="panel-heading">
                      Consignee Details
                  </header>
                  <table class="table table-striped">
                      <tbody>
                          <tr>
                              <td>Name</td>
                              <td><span style="font-size:14px; color:#000;"><strong>{{ $consignee->name }}</strong></td>
                          </tr>
                          <tr>
                              <td>Type</td>
                              <td>{{ $consignee->type }}</td>
                          </tr>
                          <tr>
                              <td>Address</td>
                              <td>{{ $consignee->address }}</td>
                          </tr>
                          <tr>
                              <td>Country</td>
                              <td>{{ $consignee->country }}</td>
                          </tr>
                          <tr>
                              <td>Phone</td>
                              <td>{{ $consignee->phone }}</td>
                          </tr>
                          <tr>
                              <td>Email</td>
                              <td>{{ $consignee->email }}</td>
                          </tr>
                      </tbody>
                </table>
              </section>
            </div>
        </div>
    </section>
</section>
@endsection