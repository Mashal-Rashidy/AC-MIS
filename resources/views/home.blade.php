@extends('layouts.master')
@section('page_title')
    {{-- <h3><span class="badge badge-light" style="font-weight: bold">Test Project</span></h3> --}}
@endsection

@section('header')

@endsection


@section('content')
    <!--begin::Dashboard-->
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <div class="card bg-light-success " style="height:120px !important">
                        <div class="text-dark">
                            <div class="card-body">
                                <div class="d-flex justify-content-around">
                                    <div class="font-weight-bolder">
                                        <h3><b>1000</b></h3>
                                        <p>Total</p>
                                    </div>
                                    <div>
                                        <span class="flaticon2-arrow-up" style="font-weight: bolder; font-size:30px"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card bg-light-info ">
                        <div class="text-dark">
                            <div class="card-body">
                                <div class="d-flex justify-content-around">
                                    <div class="font-weight-bolder">
                                        <h3><b>1000</b></h3>
                                        <p>Total</p>
                                    </div>
                                    <div>
                                        <span class="flaticon2-arrow-up" style="font-weight: bolder; font-size:30px"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card bg-light-danger ">
                        <div class="text-dark">
                            <div class="card-body">
                                <div class="d-flex justify-content-around">
                                    <div class="font-weight-bolder">
                                        <h3><b>1000</b></h3>
                                        <p>Total</p>
                                    </div>
                                    <div>
                                        <span class="flaticon2-arrow-up" style="font-weight: bolder; font-size:30px"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card bg-light-primary ">
                        <div class="text-dark">
                            <div class="card-body">
                                <div class="d-flex justify-content-around">
                                    <div class="font-weight-bolder">
                                        <h3><b>1000</b></h3>
                                        <p>Total</p>
                                    </div>
                                    <div>
                                        <span class="flaticon2-arrow-down"
                                            style="font-weight: bolder; font-size:30px"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Dashboard-->
@endsection
