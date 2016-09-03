@extends('layouts.master')
@section('title')
    Admin
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
              <div class="col-lg-12">
                  <h3 class="page-header"><i class="fa fa fa-bars"></i>Dashboard</h3>
                  <ol class="breadcrumb">
    				<li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
    				<li><i class="fa fa-laptop"></i>Dashboard</li>
    			  </ol>
        		</div>
        	</div>
            <div class="row">
    			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
    				<a href="{{ route('user.list') }}">
        				<div class="info-box blue-bg">
        					<i class="fa fa-user" aria-hidden="true"></i>
        					<div class="count">User</div>
        					<div class="title">Management</div>						
        				</div><!--/.info-box-->	
    				</a>
    			</div><!--/.col-->
    			
    			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
    			    <a href="{{ route('bookings.list') }}">
        				<div class="info-box brown-bg">
        					<i class="fa fa-book"></i>
        					<div class="count">Manage</div>
        					<div class="title">Bookings</div>						
        				</div><!--/.info-box-->
        			</a>
    			</div><!--/.col-->	
    			
    			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
    				<a href="{{ route('consignee.list') }}">
    				    <div class="info-box dark-bg">
        					<i class="fa fa-users"></i>
        					<div class="count">Consignees</div>
        					<div class="title"></div>						
        				</div><!--/.info-box-->
    				</a>		
    			</div><!--/.col-->
    			
    			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
    				<a href="{{ route('employee.list') }}">
    				    <div class="info-box green-bg">
        					<i class="icon_profile"></i>
        					<div class="count">Employees</div>
        					<div class="title">Management</div>						
        				</div><!--/.info-box-->
    				</a>
    			</div><!--/.col-->
    			
    		</div><!--/.row-->
      </section>
    </section>
@endsection

