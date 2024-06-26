@extends('layouts.master')
@section('content')
<section class="section-box-2">
    <div class="container">
      <div class="banner-hero banner-image-single">
      </div>
      <div class="row mt-10">
        <div class="col-lg-8 col-md-12">
          <h3>{{$recruteur->nom_entreprise}}</h3>
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
            <h4>Description</h4>
            <p>
                {{$recruteur->bio}}
            </p>
            <h4>Adresse</h4>
            <p>
                {{$recruteur->adresse}}
            </p>
            <h4>Telephone</h4>
            <p>
                {{$recruteur->tel}}
            </p>
            <h4>Fondateur</h4>
                <p>
                    {{$recruteur->prenom}} {{$recruteur->nom}}
                </p>

          </div>
          <div class="mt-120"></div>

        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
          <div class="sidebar-border">
            <div class="sidebar-heading">
              <div class="avatar-sidebar">
                <figure><img alt="joblist" src="{{ asset('storage/' . $recruteur->logo) }}"></figure>
                <div class="sidebar-info"><span class="sidebar-company">{{$recruteur->nom_entreprise}}</span>
                    <span class="card-location">{{$recruteur->adresse}}</span>
                </div>
              </div>
            </div>
            <div class="sidebar-list-job">
              <ul class="ul-disc">
                <li>Phone: {{$recruteur->tel}}</li>
                <li>Email: {{$recruteur->user->email}}</li>
              </ul>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
@endsection
