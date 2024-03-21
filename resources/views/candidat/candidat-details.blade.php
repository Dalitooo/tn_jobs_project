@extends('layouts.master')
@section('content')
<section class="section-box-2">
    <div class="container">
      <div class="banner-hero banner-image-single">
      </div>
      <div class="row mt-10">
        <div class="col-lg-8 col-md-12">
          <h3>{{$candidat->prenom}} {{$candidat->nom}}</h3>

        </div>
        <div class="col-lg-4 col-md-12 text-lg-end">
          <div class="btn btn-apply-icon btn-apply btn-apply-big hover-up">
            <a href="{{ route('candidat.downloadCV', $candidat) }}">Download CV</a>

          </div>
        </div>
      </div>
      <div class="border-bottom pt-10 pb-10"></div>
    </div>
  </section>
  <section class="section-box mt-50">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12 col-12">

          <div class="content-single">
            <h4>Profession</h4>
            <p>
                {{$candidat->profession}}
            </p>
            <h4>Biography</h4>
            <p>
                {{$candidat->bio}}
            </p>
            <h4>Adresse</h4>
            <p>
                test test
            </p>
            <h4>Telephone</h4>
            <p>
                {{$candidat->tel}}
            </p>


          </div>
          <div class="mt-120"></div>

        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
          <div class="sidebar-border">
            <div class="sidebar-heading">
              <div class="avatar-sidebar">
                <figure><img alt="joblist" src="{{ asset('storage/' . $candidat->image) }}"></figure>
                <div class="sidebar-info"><span class="sidebar-company">{{$candidat->prenom}} {{$candidat->nom}}</span>
                    <span class="card-location">test</span>
                </div>
              </div>
            </div>
            <div class="sidebar-list-job">
              <ul class="ul-disc">
                <li>Phone: {{$candidat->tel}}</li>
                <li>Email: {{$candidat->user->email}}</li>
              </ul>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
@endsection
