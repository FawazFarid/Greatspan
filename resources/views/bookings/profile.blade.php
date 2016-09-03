@extends('layouts.master')

@section('title')
    Booking Profile
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
			    <h3 class="page-header"><i class="fa fa fa-file"></i>Booking Profile</h3>
			    <ol class="breadcrumb">
				    <li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
				    <li><i class="fa fa-book"></i><a href="{{ route('bookings.list') }}">Bookings</a></li>
				    <li><i class="fa fa-file"></i>Booking Profile</li>
			    </ol>
		    </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <a class="btn btn-primary" href="{{ route('booking.edit', ['id' => $booking->id]) }}"><span class="icon_pencil"></span> Edit Booking</a>
            </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-6">
              <section class="panel">
                  <header class="panel-heading">
                      Booking Details
                  </header>
                  <table class="table table-striped">
                      <tbody>
                          <tr>
                              <td>Container Number</td>
                              <td>{{ $booking->container_no }}</td>
                          </tr>
                          <tr>
                              <td>Consignee</td>
                              <td><a href="{{ route('consignee.profile', ['id' => $booking->consignee_id]) }}" >{{ $booking->consignee_name }}</a></td>
                          <tr>
                              <td>Vessel</td>
                              <td>{{ $booking->vessel_name }}</td>
                          </tr>
                          <tr>
                              <td>Voyage</td>
                              <td>{{ $booking->voyageNo }}</td>
                          </tr>
                          <tr>
                              <td>ETA</td>
                              <td>{{ $booking->eta }}</td>
                          </tr>
                          <tr>
                              <td>Status</td>
                              <td><span style="font-size:14px; color:#4cd964;"><strong>{{ $booking->status }}</strong></td>
                          </tr>
                          <tr>
                              <td>B/L</td>
                              <td>{{ $booking->bl }}</td>
                          </tr>
                          <tr>
                              <td>Delivery Order</td>
                              <td>{{ $booking->delivery_order }}</td>
                          </tr>
                          <tr>
                              <td>Weight</td>
                              <td>{{ $booking->weight }}</td>
                          </tr>
                          <tr>
                              <td>Port Charges</td>
                              <td>{{ $booking->port_charges }}</td>
                          </tr>
                          <tr>
                              <td>Port Charges Date</td>
                              <td>{{ $booking->port_charges_date}}</td>
                          </tr>
                      </tbody>
                  </table>
              </section>
          </div>
          <div class="col-sm-6">
              <section class="panel">
                  <header class="panel-heading">
                      Booking Details
                  </header>
                  <table class="table table-striped">
                      <tbody>
                          <tr>
                              <td>Entry Passed</td>
                              <td>{{ $booking->entry_passed }}</td>
                          </tr>
                          <tr>
                              <td>T810 Released</td>
                              <td>{{ $booking->t810_released }}</td>
                          </tr>
                          <tr>
                              <td>T810</td>
                              <td>{{ $booking->t810 }}</td>
                          </tr>
                          <tr>
                              <td>T812</td>
                              <td>{{ $booking->t812 }}</td>
                          </tr>
                          <tr>
                              <td>Loaded and Released</td>
                              <td>{{ $booking->loaded_released }}</td>
                          </tr>
                          <tr>
                              <td>Driver</td>
                              <td><a href="{{ route('driver.profile', ['id' => $booking->driver_id]) }}" >{{ $booking->driver_name }}</a></td>
                          </tr>
                          <tr>
                              <td>Truck No.</td>
                              <td>{{ $booking->truck_no }}</td>
                          </tr>
                          <tr>
                              <td>Trailer No.</td>
                              <td>{{ $booking->trailer_no }}</td>
                          </tr>
                          <tr>
                              <td>Destination</td>
                              <td>{{ $booking->destination }}</td>
                          </tr>
                          <tr>
                              <td>Transfer Date</td>
                              <td>{{ $booking->transfer_date }}</td>
                          </tr>
                          <tr>
                              <td>Return Date</td>
                              <td>{{ $booking->return_date }}</td>
                          </tr>
                      </tbody>
                  </table>
              </section>
          </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
              <section class="panel">
                  <table class="table">
                      <tbody>
                          <tr>
                              <td>Documents</td>
                              <td><span style="font-size:14px; color:#000;"><strong>{{ $booking->documents }}</strong></td>
                          </tr>
                          <tr>
                              <td>Notes</td>
                              <td>{{ $booking->notes }}</td>
                          </tr>
                      </tbody>
              </section>
            </div>
        </div>
    </section>
</section>
@endsection