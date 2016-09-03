@extends('layouts.master')

@section('title')
    New Booking
@endsection

@push('styles')
      <link href="{{ URL::to('css/selectize.bootstrap3.css')}}" rel="stylesheet">
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
    				    <li><i class="fa fa-book"></i><a href="{{ route('bookings.list') }}">Bookings</a></li>
    				    <li><i class="fa fa-plus"></i>Create Booking</li>
    			    </ol>
    		    </div>
            </div>
            <!-- content start-->
            <div class="row">
                <form class="form-horizontal " method="post">
                    <!--First panel start-->
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                 Booking Form
                            </header>
                            <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Consignee *</label>
                                        <div class="col-sm-10">
                                            <select id="consignee-select" class="form-control" placeholder="Select Consignee" name="consignee"></select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <label class="col-sm-2 control-label">Vessel *</label>
                                                <div class="col-sm-5">
                                                    <select id="vessel-select" class="form-control" placeholder="Select Vessel" name="vessel"></select>
                                                </div>
                                                <label class="col-sm-1 control-label">Voyage</label>
                                                <div class="col-lg-4">
                                                    <input type="text" class="form-control" name="voyage">
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                     <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="row">
                                              <label class="col-sm-2 control-label">Container Number *</label>
                                              <div class="col-lg-5">
                                                    <input type="text" class="form-control" name="container">
                                              </div>
                                              <label class="col-sm-1 control-label">ETA *</label>
                                                <div class="col-lg-4">
                                                    <input type="text" class="form-control" name="eta">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Status *</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" placeholder="Status" name="status">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Documents</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" placeholder="Documents Submitted" name="documents">
                                        </div>
                                    </div>
                              </div>
                        </section>
                    </div>
                    <!--First panel end-->
                    <!--Second panel start-->
                    <div class="col-lg-12">
                        <section class="panel">
                            <div class="panel-body">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <label class="col-sm-2 control-label">B/L</label>
                                                <div class="col-lg-5">
                                                    <input type="text" class="form-control" name="bl">
                                                </div>
                                                <label class="col-sm-1 control-label">Delivery Order</label>
                                                <div class="col-lg-4">
                                                    <input type="text" class="form-control" name="delivery_order">
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                     <div class="form-group">
                                         <label class="col-sm-2 control-label">Weight</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="weight">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="row">
                                              <label class="col-sm-2 control-label">Port Charges</label>
                                              <div class="col-lg-5">
                                                    <input type="text" class="form-control" name="port_charges">
                                              </div>
                                              <label class="col-sm-1 control-label">Date</label>
                                              <div class="col-lg-4">
                                                    <input type="text" class="form-control" name="port_charges_date">
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="row">
                                              <label class="col-sm-2 control-label">Entry Passed</label>
                                              <div class="col-lg-5">
                                                    <input type="text" class="form-control" name="entry_passed">
                                              </div>
                                              <label class="col-sm-1 control-label">T810</label>
                                                <div class="col-lg-4">
                                                    <input type="text" class="form-control" name="t810_released">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="row">
                                              <label class="col-sm-2 control-label">T810 No</label>
                                              <div class="col-lg-5">
                                                    <input type="text" class="form-control" name="t810">
                                              </div>
                                              <label class="col-sm-1 control-label">T812 No</label>
                                              <div class="col-lg-4">
                                                    <input type="text" class="form-control" name="t812">
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                         <label class="col-sm-2 control-label">Loaded and Released</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="loaded_released">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                         <label class="col-sm-2 control-label">Notes</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="notes" rows="6"></textarea>
                                        </div>
                                    </div>
                                     
                              </div>
                        </section>
                    </div>
                    <!--Second panel end-->
                    <!--Third Panel Start-->
                    <div class="col-lg-12">
                        <section class="panel">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Driver</label>
                                    <div class="col-sm-10">
                                       <select id="driver-select" class="form-control" placeholder="Select Driver" name="driver"></select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="row">
                                          <label class="col-sm-2 control-label">Truck No</label>
                                          <div class="col-lg-5">
                                                <input type="text" class="form-control" name="truck_no">
                                          </div>
                                          <label class="col-sm-1 control-label">Trailer No</label>
                                          <div class="col-lg-4">
                                                <input type="text" class="form-control" name="trailer_no">
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <!--Third Panel end-->
                    <!--Fourth Panel Start-->
                    <div class="col-lg-12">
                        <section class="panel">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Destination</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="destination">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="row">
                                          <label class="col-sm-2 control-label">Transfer Date</label>
                                          <div class="col-lg-5">
                                                <input type="text" class="form-control" name="transfer_date">
                                          </div>
                                          <label class="col-sm-1 control-label">Return Date</label>
                                          <div class="col-lg-4">
                                                <input type="text" class="form-control" name="return_date">
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="_token" value="{{ Session::token() }}" />
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-sm-3">
                                        <button type="submit" class="btn btn-block  btn-info"><i class="fa fa-save"></i> Save</button>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <!--Fourth Panel End-->
                    <input type="hidden" name="user">
                </form>
            </div>
            <!-- content end-->
        </section>
    </section>
    
    @include('vessels.new')
    
    @include('drivers.new')
@endsection
@push('scripts')
      <script src="{{ URL::to('js/selectize.min.js')}}"></script>
@endpush