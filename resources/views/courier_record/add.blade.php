@extends('dashboard.app')
@section('title')
    Save Local Record
@endsection
@section('content')
    <div class="jumbotron">
        <h1>
            Save Courier Record
            <i class="fa fa-save text-success"></i>
        </h1>
    </div>
    @php
        $message = "Must have Following Columns in file \t Hello";
    @endphp
    <div class="container">
        <form action="{{action('CourierRecordController@store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="col-12">
                    <label class="col-form-label">
                    Upload File*
                    {{-- <i class="btn text-info" data-toggle="tooltip" data-placement="right" title="{{$message}}">
                        <i class="fa fa-info"></i>
                    </i> --}}
                        <br>
                        <small>*Upload Excel file only</small>
                    </label>
                    {{-- <input type="file" name="courier-file" required> --}}
                    <input type="file" name="local-file" id="fileUpload" required class="filepond">
                </div>
            </div>
            <div class="form-row">
                <div class="col-12">
                    <button type="submit" class="btn btn-success col-6 offset-3">
                        <i class="fa fa-save"></i>
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('js')
    <script src="{{asset('assets/js/filepond-plugin-file-validate-size.js')}}"></script>
    <script src="{{asset('assets/js/filepond-plugin-file-validate-type.js')}}"></script>
    <script src="{{asset('assets/js/filepond-plugin-file-encode.js')}}"></script>
@endsection
