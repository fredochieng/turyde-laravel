@extends('adminlte::page')

@section('title', 'Manage Driver | M-Safiri Turyde')

@section('content_header')
<h1><strong>DRIVER - {{$drivers->name}}</strong>
    <p class="pull-right">
        <a href="#" data-toggle="modal" data-target="#modal_edit_driver_{{ $drivers->driver_id }}"
            class="btn btn-primary btn-sm btn-flat"><i class="fas fa-fw fa-plus-circle"></i>
            EDIT DRIVER</a>
    </p>
</h1>
@stop

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body  with-border">
        <table class="table table-no-margin">
            <tbody style="font-size:12px">
                <tr>
                    <td style=""><strong>DRIVER NAME: </strong> {{$drivers->name}}</td>
                    <td style=""><strong>EMAIL ADDRESS: </strong> {{$drivers->email}}</td>
                    <td style=""><strong>PHONE NUMBER: </strong> {{$drivers->phone_no}}</td>
                    <td style=""><strong>GENDER: </strong> {{$drivers->gender}}</td>
                    <td style=""><strong>DATE OF BIRTH: </strong> {{$drivers->dob}}</td>
                </tr>
                <tr>
                    <td style=""><strong>DRIVER COUNTRY: </strong> {{ $drivers->country }}</td>
                    <td style=""><strong>DRIVER CITY: </strong> {{$drivers->city}}</td>
                    <td style=""><strong>DRIVER ZIPCODE: </strong> {{$drivers->zipcode}}</td>
                    <td style=""><strong>DRIVER ADDRESS: </strong> {{$drivers->address}}</td>
                    <td style=""><strong>DRIVER VEHICLE: </strong> KCT 657F</td>
                </tr>
                <tr>
                    <td style=""><strong>DRIVER IMAGE: </strong> <a href="/{{ $drivers->driver_image }}"
                            target="_blank">
                            <i class="fa fa-fw fa-download"></i> DOWNLOAD</a></td>
                    <td style=""><strong>DRIVER LICENSE: </strong> <a href="/{{ $drivers->licence_file }}"
                            target="_blank">
                            <i class="fa fa-fw fa-download"></i> DOWNLOAD</a></td>
                    <td style=""><strong>DRIVER ADDRESS PROOF: </strong> <a href="/{{ $drivers->address_file }}"
                            target="_blank">
                            <i class="fa fa-fw fa-download"></i> DOWNLOAD</a></td>

                    <td style=""><strong>DRIVER ADDRESS: </strong> {{$drivers->address}}</td>
                    @if ($drivers->driver_status == 'Inactive')
                    <td><strong>STATUS: <span class="badge bg-yellow">{{ $drivers->driver_status }}</span></strong></td>
                    @else
                    <td><strong>STATUS: <span class="badge bg-green">{{ $drivers->driver_status }}</span></strong></td>
                    @endif
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Trip History</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body  with-border">
        <div class="table-responsive">
            <table id="records" class="table table-hover" style="font-size:13px">
                <thead>
                    <tr>
                        <th>Trip ID</th>
                        <th>Vehicle Number</th>
                        <th>Vehicle Name</th>
                        <th>Pickup Location</th>
                        <th>Destination</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Trip Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tr>
                    <td>43563</td>
                    <td>KCT 654F</td>
                    <td>Audi</td>
                    <td>Westlands</td>
                    <td>Lavington</td>
                    <td>2019-10-09 10:00AM</td>
                    <td>2019-10-09 11:00AM</td>
                    <td>Finished</td>
                </tr>
                <tr>
                    <td>43563</td>
                    <td>KCT 654F</td>
                    <td>Audi</td>
                    <td>Westlands</td>
                    <td>Lavington</td>
                    <td>2019-10-09 10:00AM</td>
                    <td>2019-10-09 11:00AM</td>
                    <td>Finished</td>
                </tr>
                <tr>
                    <td>43563</td>
                    <td>KCT 654F</td>
                    <td>Audi</td>
                    <td>Westlands</td>
                    <td>Lavington</td>
                    <td>2019-10-09 10:00AM</td>
                    <td>2019-10-09 11:00AM</td>
                    <td>Finished</td>
                </tr>
                <tr>
                    <td>43563</td>
                    <td>KCT 654F</td>
                    <td>Audi</td>
                    <td>Westlands</td>
                    <td>Lavington</td>
                    <td>2019-10-09 10:00AM</td>
                    <td>2019-10-09 11:00AM</td>
                    <td>Finished</td>
                </tr>
                <tr>
                    <td>43563</td>
                    <td>KCT 654F</td>
                    <td>Audi</td>
                    <td>Westlands</td>
                    <td>Lavington</td>
                    <td>2019-10-09 10:00AM</td>
                    <td>2019-10-09 11:00AM</td>
                    <td>Finished</td>
                </tr>
                <tr>
                    <td>43563</td>
                    <td>KCT 654F</td>
                    <td>Audi</td>
                    <td>Westlands</td>
                    <td>Lavington</td>
                    <td>2019-10-09 10:00AM</td>
                    <td>2019-10-09 11:00AM</td>
                    <td>Finished</td>
                </tr>
                <tr>
                    <td>43563</td>
                    <td>KCT 654F</td>
                    <td>Audi</td>
                    <td>Westlands</td>
                    <td>Lavington</td>
                    <td>2019-10-09 10:00AM</td>
                    <td>2019-10-09 11:00AM</td>
                    <td>Finished</td>
                </tr>
                <tr>
                    <td>43563</td>
                    <td>KCT 654F</td>
                    <td>Audi</td>
                    <td>Westlands</td>
                    <td>Lavington</td>
                    <td>2019-10-09 10:00AM</td>
                    <td>2019-10-09 11:00AM</td>
                    <td>Finished</td>
                </tr>
                <tr>
                    <td>43563</td>
                    <td>KCT 654F</td>
                    <td>Audi</td>
                    <td>Westlands</td>
                    <td>Lavington</td>
                    <td>2019-10-09 10:00AM</td>
                    <td>2019-10-09 11:00AM</td>
                    <td>Finished</td>
                </tr>
                <tr>
                    <td>43563</td>
                    <td>KCT 654F</td>
                    <td>Audi</td>
                    <td>Westlands</td>
                    <td>Lavington</td>
                    <td>2019-10-09 10:00AM</td>
                    <td>2019-10-09 11:00AM</td>
                    <td>Finished</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@stop
{{-- @include('interviews.modals.modal_edit_interview')
@include('interviews.modals.modal_start_session')
@include('interviews.modals.modal_add_candidates') --}}
@section('css')
<link rel="stylesheet" href="/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="/css/bootstrap-timepicker.min.css">
@stop
@section('js')
<script src="/js/bootstrap-datepicker.min.js"></script>
<script src="/js/bootstrap-timepicker.min.js"></script>
<script src="/js/dataTable.js"></script>
@stop