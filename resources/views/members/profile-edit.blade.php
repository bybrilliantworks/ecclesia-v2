@extends('layouts.auth')

@section('title', 'Membership Profile')

@section('content')
<a href="{{url("/")}}" class="logo-name text-lg text-center">Ecclesia</a>
<p class="text-center m-t-md">Update your membership profile.</p>
@include('partials.errors')
@include('partials.failure')
@include('partials.success')
@include('partials.info')
<form class="m-t-md" role="form" method="POST" action="{{ url('/member/profile') }}">
    {!! csrf_field() !!}

    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
        <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" placeholder="First name" required>
        @if ($errors->has('first_name'))
            <span class="help-block">
                <strong>{{ $errors->first('first_name') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
        <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="Last name" required>
        @if ($errors->has('last_name'))
            <span class="help-block">
                <strong>{{ $errors->first('last_name') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Your email address" required>

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('mobile_number') ? ' has-error' : '' }}">
        <input type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number') }}" placeholder="Your mobile number" required>

        @if ($errors->has('mobile_number'))
            <span class="help-block">
                <strong>{{ $errors->first('mobile_number') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
        <input type="tel" class="form-control" name="address" value="{{ old('address') }}" placeholder="Your address" required>

        @if ($errors->has('address'))
            <span class="help-block">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('neighbourhood') ? ' has-error' : '' }}">
            <input type="text" class="form-control" name="neighbourhood" value="{{ old('neighbourhood') }}" placeholder="Your neighbourhood" required>

            @if ($errors->has('neighbourhood'))
                <span class="help-block">
                    <strong>{{ $errors->first('neighbourhood') }}</strong>
                </span>
            @endif
        </div>

    <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
        <label for="birthday" class="control-label">Your date of birth</label>
        <input type="date" class="form-control" name="birthday" value="{{ old('birthday') }}" placeholder="Your birthday" required>

        @if ($errors->has('birthday'))
            <span class="help-block">
                <strong>{{ $errors->first('birthday') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        <select name="marital_status" id="maritalStatus" class="form-control" required>
            <option value="">Select marital status</option>
            <option value="single">Single</option>
            <option value="married">Married</option>
            <option value="divorced">Divorced</option>
            <option value="separated">Separated</option>
            <option value="others">Others</option>
        </select>
    </div>
    <div class="form-group">
        <select name="gender" id="gender" class="form-control" required>
            <option value="">Select your gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
    </div>
    <div class="form-group">
        <select name="employment_status" id="employmentStatus" class="form-control" required>
            <option value="">Select your employment status...</option>
            <option value="employed">Employed</option>
            <option value="unemployed">Unemploymed</option>
            <option value="self-employed">Self-employed</option>
            <option value="student">Student</option>
            <option value="retired">Retiree</option>
            <option value="other">other</option>
        </select>
    </div>



    <div class="form-group">
        <input type="text" name="occupation" id="occupation" class="form-control" value="{{old('occupation')}}" placeholder="Occupation" required>
    </div>

    <div class="form-group{{ $errors->has('membership_number') ? ' has-error' : '' }}">
        <label for="membershipNumber" class="control-label">Your membership number</label>

        <input type="text" class="form-control" name="membership_number" value="{{ old('membership_number') }}" placeholder="EAXXX">

        @if ($errors->has('membership_number'))
            <span class="help-block">
                <strong>{{ $errors->first('membership_number') }}</strong>
            </span>
        @endif
    </div>


    <button type="submit" class="btn btn-primary btn-block">
        <i class="fa fa-btn fa-user"></i> Submit
    </button>

</form>
@endsection
