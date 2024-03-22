@extends('layouts.master')
@section('content')
<section class="section-box mt-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="box-nav-tabs nav-tavs-profile mb-5">
                    <ul class="nav" role="tablist">
                        <li><a class="btn btn-border mb-20" href="{{route('candidat.create')}}">Profile</a></li>
                        <li><a class="btn btn-border mb-20" href="{{route('candidat.dashboard')}}">Dashboard</a></li>
                        <li><a class="btn btn-border mb-20" href="{{route('candidat.candidatures')}}">Mes Candidatures</a></li>
                        <li><a class="btn btn-border mb-20 active" href="{{route('candidat.editPrivacy')}}">Privacy Settings</a></li>
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

                <br>
                <div class="content-single">
                  <h3 class="mt-0 mb-15 color-brand-1">Privacy</h3>
                  <div class="mt-35 mb-40 box-info-profie">
                    <form action="email_handler.php" method="post">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label class="font-sm color-text-mutted mb-10">Email</label>
                              <input class="form-control" type="email" name="email" placeholder="Enter your email">
                          </div>
                      </div>
                      <button type="submit" class="btn btn-apply">Edit Email</button>
                  </form>
                  </div>
                  <div class="row form-contact">
                    <form action="password_handler.php" method="post">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label class="font-sm color-text-mutted mb-10">Current Password</label>
                              <input class="form-control" type="password" name="current_password" placeholder="Enter current password">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label class="font-sm color-text-mutted mb-10">New Password</label>
                              <input class="form-control" type="password" name="new_password" placeholder="Enter new password">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label class="font-sm color-text-mutted mb-10">Confirm Password</label>
                              <input class="form-control" type="password" name="confirm_password" placeholder="Confirm new password">
                          </div>
                      </div>
                      <button type="submit" class="btn btn-apply">Submit</button>
                  </form>

                  </div>
                </div>
              </div>
        </div>
    </div>
</section>
@endsection


