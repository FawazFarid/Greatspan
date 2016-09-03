@extends('layouts.master')

@section('title')
    Users
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
    			    <h3 class="page-header"><i class="fa fa fa-users"></i>Users</h3>
    			    <ol class="breadcrumb">
    				    <li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
    				    <li><i class="fa fa-users"></i><a href="{{ route('user.list') }}">Users</a></li>
    			    </ol>
    		    </div>
            </div>
            <!-- content start-->
            <div class="row">
                <div class="col-sm-3">
                    <a class="btn btn-primary" href="{{ route('register') }}"><span class="icon_plus"></span> Add New User</a>
                </div>
            </div>   
            <br>
                <!--Table Start-->
            <div class="row">    
                <div class="col-sm-12">
                    <table class="table " id="user-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach($users as $user)
                              <tr>
                                  <td>{{ $user->name }}</td>
                                  <td>{{ $user->email }}</td>
                                  <td><a href=" {{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Edit</a>
                        <a href=" {{ route('user.delete', ['id' => $user->id]) }}" class="btn btn-xs btn-danger" onclick="return confirm(\'Are you sure you want to delete this this?\');"><i class="fa fa-trash-o"></i> Delete</a></td>
                              </tr>
                        @endforeach
                    </table>
                </div>
                <!--Table End-->
            </div>
            <!-- content end-->
        </section>
    </section>
@endsection