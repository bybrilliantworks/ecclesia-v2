@extends('layouts.app')

@section('styles')

    <link href="{{url('assets/plugins/x-editable/bootstrap3-editable/css/bootstrap-editable.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('assets/plugins/bootstrap-datepicker/css/datepicker3.css')}}" rel="stylesheet" type="text/css"/>

@endsection

@section('content')

    <div class="page-inner">

        <div class="page-title">
            <h3>Members</h3>
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{url('/members')}}">Members</a></li>
                    <li class="active">Create new</li>
                </ol>
            </div>
        </div>
        <div id="main-wrapper">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-white">
                        <div class="panel-heading clearfix">
                            <h4 class="panel-title">Create a new member account</h4>
                        </div>
                        <div class="panel-body">
                            @include('partials.errors')
                            @include('partials.failure')
                            @include('partials.success')
                            @include('partials.info')
                            <form class="form form-horizontal" role="form" action="{{url('/members')}}" method="post">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <label for="firstName" class="control-label col-sm-2">First Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="firstName" name="firstName" value="{{old('firstName')}}" placeholder="First Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastName" class="control-label col-sm-2">Last Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="lastName" name="lastName" value="{{old('lastName')}}" placeholder="Last Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="control-label col-sm-2">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address" class="control-label col-sm-2">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="address" name="address" value="{{old('address')}}" placeholder="Address" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address" class="control-label col-sm-2">Birthday</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="address" name="birthday" value="{{old('birthday')}}" placeholder="Birthday" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mobileNumber" class="control-label col-sm-2">Mobile Number</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="mobileNumber" name="mobileNumber" value="{{old('mobileNumber')}}" placeholder="Mobile Number" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="maritalStatus" class="control-label col-sm-2">Marital Status</label>
                                    <div class="col-sm-10">
                                        <select name="maritalStatus" id="maritalStatus" class="form-control" required>
                                            <option value="">Select marital status</option>
                                            <option value="single">Single</option>
                                            <option value="married">Married</option>
                                            <option value="others">Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="gender" class="control-label col-sm-2">Gender</label>
                                    <div class="col-sm-10">
                                        <select name="gender" id="gender" class="form-control" required>
                                            <option value="">Select gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="occupation" class="control-label col-sm-2">Occupation</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="occupation" id="occupation" class="form-control" value="{{old('occupation')}}" placeholder="Occupation" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="dateJoined" class="control-label col-sm-2">Date Joined</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="dateJoined" class="form-control" placeholder="Date joined" value="{{old('dateJoined')}}" required>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="certifiedCode" class="control-label col-sm-2">Certified Membership Number</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="certifiedCode" class="form-control" placeholder="Certified Membership number" value="{{ old('certifiedCode') }}">
                                    </div>
                                </div>
                                <div class="form-actions pull-right">
                                    <button type="reset" class="btn btn-default">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-white">
                        <div class="panel-heading clearfix">
                            Bulk upload members
                        </div>
                        <div class="panel-body">
                                @include('partials.errors')
                                @include('partials.failure')
                                @include('partials.success')
                                @include('partials.info')
                                <form class="form form-horizontal" role="form" action="{{url('/upload/members')}}" method="post">
                                    {!! csrf_field() !!}
                                    <div class="form-group">
                                        <label for="lastName" class="control-label col-sm-2">File</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" id="file" name="file" value="{{old('lastName')}}" placeholder="File" required>
                                        </div>
                                    </div>
                                
                                    <div class="form-actions pull-right">
                                        <button type="reset" class="btn btn-default">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div><!-- Row -->
        </div><!-- Main Wrapper -->

    </div>

@endsection


@section('scripts')
    <script src="{{url('assets/plugins/jquery-mockjax-master/jquery.mockjax.js')}}"></script>
    <script src="{{url('assets/plugins/moment/moment.js')}}"></script>
    <script src="{{url('assets/plugins/datatables/js/jquery.datatables.min.js')}}"></script>
    <script src="{{url('assets/plugins/x-editable/bootstrap3-editable/js/bootstrap-editable.js')}}"></script>
    <script src="{{url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{url('assets/js/modern.min.js')}}"></script>
    <script src="{{url('assets/js/pages/table-data.js')}}"></script>

@endsection
