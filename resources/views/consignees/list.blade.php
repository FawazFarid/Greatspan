@extends('layouts.master')

@section('title')
    Consignees
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
    			    <h3 class="page-header"><i class="fa fa fa-users"></i>Consignees</h3>
    			    <ol class="breadcrumb">
    				    <li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
    				    <li><i class="fa fa-users"></i><a href="{{ route('consignee.list') }}">Consignees</a></li>
    			    </ol>
    		    </div>
            </div>
            <!-- content start-->
            <div class="row">
                <div class="col-sm-3">
                    <a class="btn btn-primary" href="{{ route('consignee.new') }}"><span class="icon_plus"></span> Add Consignee</a>
                </div>
            </div>   
                <!--Table Start-->
            <div class="row">    
                <div class="col-sm-12">
                    <table class="table " id="consignees-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Address</th>
                                <th>Country</th>
                                <th>Phone</th>
                                <th>Email</th>
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
    $('#consignees-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('consignee.datatable') }}",
        columns: [
            //{ data: 'id', name:'id'},
            { data: 'name', name: 'name' },
            { data: 'type', name: 'type' },
            { data: 'address', name: 'address' },
            { data: 'country', name: 'country' },
            { data: 'phone', name: 'phone' },
            { data: 'email', name: 'email' },
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});
</script>
@endpush