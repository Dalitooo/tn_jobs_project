@extends('layouts.master')
@section('content')
<section class="section-box mt-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="box-nav-tabs nav-tavs-profile mb-5">
                    <ul class="nav" role="tablist">
                        <li><a class="btn btn-border mb-20" href="{{route('candidat.create')}}">Profile</a></li>
                        <li><a class="btn btn-border mb-20 active" href="{{route('candidat.dashboard')}}">Dashboard</a></li>
                        <li><a class="btn btn-border mb-20" href="{{route('candidat.candidatures')}}">Mes Candidatures</a></li>
                        <li><a class="btn btn-border mb-20" href="{{route('candidat.editPrivacy')}}">Privacy Settings</a></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <a class="btn btn-border mb-20" >
                                    <button type="submit">Logout</button>
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                <div class="content-single">
                  <h3 class="mt-0 mb-0 color-brand-1">Dashboard</h3>
                  <div class="dashboard_overview">
                    <div class="row">
                      <div class="col-lg-4 col-md-6">
                        <div class="dash_overview_item bg-info-subtle">
                          <h2>{{$nbr}} <span>job applied</span></h2>
                          <span class="icon"><i class="fas fa-briefcase"></i></span>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-6">
                        <div class="dash_overview_item bg-danger-subtle">
                          <h2>12 <span>job accepted</span></h2>
                          <span class="icon"><i class="fas fa-briefcase"></i></span>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-6">
                        <div class="dash_overview_item bg-warning-subtle">
                          <h2>12 <span>Profile status</span></h2>
                          <span class="icon"><i class="fas fa-briefcase"></i></span>
                        </div>
                      </div>
                    </div>
                    @if(!auth()->user()->candidat)
                    <div class="row">
                      <div class="col-12 mt-30">
                        <div class="dash_alert_box p-30 bg-danger rounded-4 d-flex flex-wrap">
                          <div class="text">
                            <h4>Setup your profile !</h4>
                            <p>Please fill in all the necessary information to complete your profile. This will help us provide you with a better experience on our platform.</p>
                          </div>
                          <a href="{{route('candidat.create')}}" class="btn btn-default rounded-1">Edit Profile</a>
                        </div>
                      </div>
                    </div>
                    @endif

                  </div>
                </div>
              </div>
        </div>
    </div>
</section>
@endsection
