@extends('dashboard.app')
@section('title')
    Local Records | {{config('app.name')}}
@endsection
@section('content')
    <div class="jumbotron">
        <h1>
            Local Records
            <i class="fa fa-list-ul"></i>
        </h1>
        <a href="{{url('local-record/create')}}" class="btn btn-success">
            <i class="fa fa-plus-circle"></i>
            Add Record
        </a>
    </div>
    <div class="container">
        @if ($local_record->count())
            <div class="row">
                <div class="col-12">
                    <table class="table table-responsive display" id="data_table">
                        <thead>
                            <tr>
                                <th>SR#</th>
                                <th>Customer Name</th>
                                <th>Tracking ID</th>
                                <th>Customer CNIC</th>
                                <th>Shipping Charged</th>
                                <th>Parcel Weight</th>
                                <th>Shipping Date</th>
                                <th>Shipping Address</th>
                                <th>Deliver In Days</th>
                                <th>Saved On</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($local_record as $key=>$value)
                                <tr>
                                    <td>
                                        {{$key+1}}
                                    </td>
                                    <td>
                                        {{$value->customer_name}}
                                    </td>
                                    <td>
                                        {{$value->tracking_id}}
                                    </td>
                                    <td>
                                        {{$value->customer_cnic}}
                                    </td>
                                    <td>
                                        {{$value->shipping_charged}} Rs
                                    </td>
                                    <td>
                                        {{$value->parcel_weight}} Kg<small>(s)</small>
                                    </td>
                                    <td>
                                        {{
                                            \Carbon\Carbon::parse($value->shipped_on)->format('d-M-Y')
                                        }}
                                    </td>
                                    <td>
                                        {{$value->shipping_address}}
                                    </td>
                                    <td>
                                        {{$value->deliver_in_days}}
                                    </td>
                                    <td>
                                        {{
                                            \Carbon\Carbon::parse($value->created_at)->format('d-M-Y')
                                        }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-danger">
                        <h3>
                            No Record Found
                            <a href="{{url('local-record/create')}}" class="btn  btn-warning text-decoration-none text-dark">
                                <i class="fa fa-plus-circle"></i>
                                Add Record
                            </a>
                        </h3>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
