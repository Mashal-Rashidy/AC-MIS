@extends('layouts.master')

@section('header')
    چک نمودن کارمندان
@endsection
@section('content')
    <style>
        label#name_en-error {
            float: left !important;
        }

        label#name_dr-error {
            float: left !important;
        }
    </style>

    <div class="card">
        <div class="card-header">
            <h2 class="card-title">چک کردن کارت</h2>
        </div>
        <div class="card-body">
            <form id="search_form">
                @csrf
                <div class="row">
                    <div class="col-md-10">
                        <input type="text" name="search_id" id="search_id" autofocus="on" required class="form-control"
                            placeholder="ای دی کارمند را بنوسید">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-sm btn-outline-primary pr-1"><i
                                class="flaticon-search"></i></button>
                    </div>
                </div>
            </form>
        </div>

        <div class="card-footer">
            <div class="alert alert-success" id="showMsgDiv" hidden>
                <table class="table table-bordered">
                    <tbody id="showMsg">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('#search_form').submit(function(event) {
            event.preventDefault();
            $.ajax({
                url: '{{ route('employee-card-check') }}',
                type: 'GET',
                data: $(this).serialize(),
                beforeSend: function() {
                    startPageLoader();
                },
                success: function(response) {
                    stopPageLoader();
                    if (response != '') {
                        $('#showMsg').append(response)
                        $('#showMsgDiv').attr('hidden', false);
                    }else{
                        $('#showMsgDiv').attr('hidden', true);
                        error_function('معلومات موجو نیست');
                    }

                },
                error: function() {
                    error_function(
                        "There Is Problem on Processing Your Request Please Contact Database Administrator!"
                    );
                    stopModalLoader();
                }
            });
        });
    </script>
@endsection
