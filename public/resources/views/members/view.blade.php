
@extends('layouts.app')

@section('title', $member->first_name . " " . $member->last_name)


@section('content')
<div class="page-inner">

  <div class="profile-cover">
      <div class="row">
          <div class="col-md-3 profile-image">
              <div class="profile-image-container">
                  <img src="{{asset('assets/images/profile-menu-image.png')}}" alt="Profile picture" style="width:150px; height:150px">
              </div>
          </div>
      </div>
  </div>

  <div id="main-wrapper">
      <div class="row">
          <div class="col-md-3 user-profile">
              <h3 class="text-center">{{ $member->first_name . " " . $member->last_name}}</h3>
              <p class="text-center">{{ $member->occupation }}</p>
              <hr>
              <ul class="list-unstyled text-center">
                  <li><p><i class="fa fa-map-marker m-r-xs"></i>{{ $member->address }}</p></li>
                  <li><p><i class="fa fa-envelope m-r-xs"></i><a href="mailto:{{ $member->email }}" >{{ $member->email }}</a></p></li>
                  <li><p><i class="fa fa-mobile m-r-xs"></i><a href="tel:{{ $member->mobile_number }}">{{ $member->mobile_number }}</a></p></li>
                  <li><p><i class="fa fa-heart m-r-xs"></i><a href="#">{{ $member->marital_status }}</a></p></li>
                  <li><p><i class="fa fa-calendar m-r-xs"></i><a href="#">{{ $member->birthday }}</a></p></li>
              </ul>
              <hr>
              <a href="{{url('/members/' . $member->id . '/edit')}}" class="btn btn-secondary btn-block"><i class="fa fa-pencil m-r-xs"></i>Edit</a>
              <button class="btn btn-primary btn-block"><i class="fa fa-plus m-r-xs"></i>Follow up</button>
          </div>
          <div class="col-md-6 m-t-lg">
              <div class="panel panel-white">
                  <div class="panel-body">
                      
                  </div>
              </div>
             
          </div>
          <div class="col-md-3 m-t-lg">
              <div class="panel panel-white">
                  <div class="panel-heading">
                      <div class="panel-title">Church Information</div>
                  </div>
                  <div class="panel-body">
                      
                  </div>
              </div>
              <div class="panel panel-white">
                  <div class="panel-heading">
                      <div class="panel-title">Greatest Contribution</div>
                  </div>
                  <div class="panel-body">
                      <p>{{ $member->greatest_contribution }}</p>
                  </div>
              </div>
          </div>
      </div>
  </div><!-- Main Wrapper -->
  <div class="page-footer">
      <p class="no-s">2015 © Made by Enthronement Tech.</p>
  </div>

</div>
@endsection