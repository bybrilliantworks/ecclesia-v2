@extends('layouts.app')

@section('content')
    <div class="page-inner">
        <div class="page-title">
            <h3>Dashboard</h3>
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
        <div id="main-wrapper">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel info-box panel-white">
                        <div class="panel-body">
                            <div class="info-box-stats">
                                <p class="counter">0</p>
                                <span class="info-box-title">New Members this month</span>
                            </div>
                            <div class="info-box-icon">
                                <i class="icon-users"></i>
                            </div>
                            <div class="info-box-progress">
                                <div class="progress progress-xs progress-squared bs-n">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel info-box panel-white">
                        <div class="panel-body">
                            <div class="info-box-stats">
                                <p class="counter">0</p>
                                <span class="info-box-title">Events this month</span>
                            </div>
                            <div class="info-box-icon">
                                <i class="icon-calendar"></i>
                            </div>
                            <div class="info-box-progress">
                                <div class="progress progress-xs progress-squared bs-n">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel info-box panel-white">
                        <div class="panel-body">
                            <div class="info-box-stats">
                                <p>$<span class="counter">0</span></p>
                                <span class="info-box-title">Total offering this month</span>
                            </div>
                            <div class="info-box-icon">
                                <i class="icon-money"></i>
                            </div>
                            <div class="info-box-progress">
                                <div class="progress progress-xs progress-squared bs-n">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel info-box panel-white">
                        <div class="panel-body">
                            <div class="info-box-stats">
                                <p>$<span class="counter">0</span></p>
                                <span class="info-box-title">Total tithe this month</span>
                            </div>
                            <div class="info-box-icon">
                                <i class="icon-money"></i>
                            </div>
                            <div class="info-box-progress">
                                <div class="progress progress-xs progress-squared bs-n">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Row -->
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <div class="panel panel-white">

                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h4 class="panel-title">Recently Joined Members</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive project-stats">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Manager</th>
                                        <th>Progress</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- Main Wrapper -->
        <div class="page-footer">
            <p class="no-s">2019 &copy; Made by EHCC Tech.</p>
        </div>
    </div><!-- Page Inner -->

@endsection

@section('scripts')
    <script src="{{url("assets/plugins/toastr/toastr.min.js")}}"></script>
    <script src="{{url("assets/plugins/flot/jquery.flot.min.js")}}"></script>
    <script src="{{url("assets/plugins/flot/jquery.flot.time.min.js")}}"></script>
    <script src="{{url("assets/plugins/flot/jquery.flot.symbol.min.js")}}"></script>
    <script src="{{url("assets/plugins/flot/jquery.flot.resize.min.js")}}"></script>
    <script src="{{url("assets/plugins/flot/jquery.flot.tooltip.min.js")}}"></script>
    <script src="{{url("assets/plugins/curvedlines/curvedLines.js")}}"></script>
    <script src="{{url("assets/plugins/metrojs/MetroJs.min.js")}}"></script>
    <script src="{{url("assets/js/modern.min.js")}}"></script>
    <script src="{{url("assets/js/pages/dashboard.js")}}"></script>

@endsection
