@extends('layouts.master')

@section('title')
    Employees
@endsection

@push('styles')
    <link href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush

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
    			    <h3 class="page-header"><i class="fa fa fa-users"></i>Employees</h3>
    			    <ol class="breadcrumb">
    				    <li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
    				    <li><i class="fa fa-users"></i><a href="{{ route('employee.list') }}">Employees</a></li>
    			    </ol>
    		    </div>
            </div>
            <!-- content start-->
            <div class="row">
                <div class="col-sm-3">
                    <a class="btn btn-primary" href="{{ route('employee.new') }}"><span class="icon_plus"></span> Add Employee</a>
                </div>
            </div>   
                <!--Table Start-->
            <div class="row">    
                <div class="col-sm-12">
                    <table class="table " id="employees-table">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Gender</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!--Table End-->
            </div>
            <!-- content end-->
        </section>
    </section>
@endsection

@push('scripts')
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script>
$(function() {
    $('#employees-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('employee.datatable') }}",
        columns: [
            { data: 'first_name', name: 'first_name' },
            { data: 'middle_name', name: 'middle_name' },
            { data: 'gender', name: 'gender' },
            { data: 'role', name: 'role' },
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});
</script>
@endpush