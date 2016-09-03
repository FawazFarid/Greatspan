@extends('layouts.master')

@section('title')
    Bookings
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
    			    <h3 class="page-header"><i class="fa fa fa-book"></i>Bookings</h3>
    			    <ol class="breadcrumb">
    				    <li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
    				    <li><i class="fa fa-book"></i>Bookings</li>
    			    </ol>
    		    </div>
            </div>
            <!-- content start-->
            <div class="row">
                <div class="col-sm-3">
                    <a class="btn btn-primary" href="{{ route('booking.new') }}"><span class="icon_plus"></span> Add Booking</a>
                </div>
            </div>
            <div class="row">
                <!--Table Start-->
                <div class="col-sm-12">
                    <table class="table " id="bookings-table">
                        <thead>
                            <tr>
                                <th>Container</th>
                                <th>Consignee</th>
                                <th>Vessel</th>
                                <th>Voyage</th>
                                <th>B/L</th>
                                <th>ETA</th>
                                <th>Status</th>
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
        $('#bookings-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('bookings.json') }}",
            columns: [
                //{ data: 'id', name:'id'},
                { data: 'container_no', name: 'container_no' },
                { data: 'consignee_name', name: 'consignees.name' },
                { data: 'vessel_name', name: 'vessels.name' },
                { data: 'voyageNo', name: 'voyageNo' },
                { data: 'bl', name: 'bl' },
                { data: 'eta', name: 'eta' },
                { data: 'status', name: 'status'},
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endpush