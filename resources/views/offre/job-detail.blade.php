@extends('layouts.master')
@section('content')
<section class="section-box-2">
    <div class="container">
      <div class="banner-hero banner-image-single">
      </div>
      <div class="row mt-10">
        <div class="col-lg-8 col-md-12">
          <h3>{{$offre->poste}}</h3>
          <div class="mt-0 mb-15"><span class="card-time">
            created at:
            {{$offre->updated_at}}
          </span></div>
        </div>
        <div class="col-lg-4 col-md-12 text-lg-end">
          <div class="btn btn-apply-icon btn-apply btn-apply-big hover-up">
            <form action="{{Route('candidat.candidature.store',['id'=>$offre->id])}}" method="POST">
                @csrf
                <input type="submit" value="apply now">
            </form>
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
            <h4>Description</h4>
            <p>
                {{$offre->description}}
            </p>
            <h4>Exigence</h4>
            <p>
                {{$offre->exigence}}
            </p>
            <h4>Salaire</h4>
                <p>
                    {{$offre->salaire}}
                </p>
            <h4>Adresse De Travail</h4>
                <p>
                    {{$offre->lieu}}
                </p>

            <h4>Date Fin Offre</h4>
            <p>
                {{$offre->date_fin_offre}}
            </p>
          </div>
          <div class="single-apply-jobs">
            <div class="row align-items-center">
              <div class="col-md-5"><a class="btn btn-default mr-15" href="#">Apply now</a></div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
          <div class="sidebar-border">
            <div class="sidebar-heading">
              <div class="avatar-sidebar">
                <figure><img alt="joblist" src="{{ asset('storage/' . $offre->recruteur->logo) }}"></figure>
                <div class="sidebar-info"><span class="sidebar-company">{{$offre->recruteur->nom_entreprise}}</span>
                    <span class="card-location">{{$offre->recruteur->adresse}}</span>
                </div>
              </div>
            </div>
            <div class="sidebar-list-job">
              <ul class="ul-disc">
                <li>Phone: {{$offre->recruteur->tel}}</li>
                <li>Email: {{$offre->recruteur->user->email}}</li>
              </ul>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
@endsection
