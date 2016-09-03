@extends('layouts.master')

@section('title')
    Drivers
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
    			    <h3 class="page-header"><i class="fa fa fa-users"></i>Drivers</h3>
    			    <ol class="breadcrumb">
    				    <li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
    				    <li><i class="fa fa-users"></i><a href="{{ route('consignee.list') }}">Drivers</a></li>
    			    </ol>
    		    </div>
            </div>
            <!-- content start-->
            <div class="row">
                <div class="col-sm-3">
                    <a class="btn btn-primary" href="{{ route('consignee.new') }}"><span class="icon_plus"></span> Add Driver</a>
                </div>
            </div>   
                <!--Table Start-->
            <div class="row">    
                <div class="col-sm-12">
                    <table class="table " id="drivers-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>ID No</th>
                                <th>Phone</th>
                                <th>Company</th>
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
    $('#drivers-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('driver.datatable') }}",
        columns: [
            //{ data: 'id', name:'id'},
            { data: 'name', name: 'name' },
            { data: 'id_no', name: 'id_no' },
            { data: 'phone', name: 'phone' },
            { data: 'company', name: 'company' },
            { data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});
</script>
@endpush