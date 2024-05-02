@extends('layouts.master')
@section('content')
<section class="section-box-2">
    <div class="container">
      <div class="banner-hero banner-image-single">
      </div>
      <div class="row mt-10">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('alreadyApplied'))
            <div class="alert alert-info">
                {{ session('alreadyApplied') }}
            </div>
        @endif

        @if(session('notVerified'))
            <div class="alert alert-warning">
                {{ session('notVerified') }}
            </div>
        @endif
        <div class="col-lg-8 col-md-12">
          <h3>{{$offre->poste}}</h3>
          <div class="mt-0 mb-15"><span class="card-time">
            created at:
            {{$offre->updated_at}}
          </span></div>
        </div>
        <div class="col-lg-4 col-md-12 text-lg-end">
          <div class="btn btn-apply-icon btn-apply btn-apply-big hover-up">
            @if(auth()->check())
            @if(auth()->user()->role == 'admin')
                <p>Admin Can't apply.</p>
            @elseif(auth()->user()->role == 'recruteur')
                <p>You are a recruiter. You cannot apply.</p>
            @elseif(auth()->user()->role == 'candidat')
                @if(!auth()->user()->candidat)
                    <p>Your profile needs validation.</p>
                @elseif(auth()->user()->candidat && !auth()->user()->candidat->verif)
                    <p>Waiting for profile validation.</p>
                @elseif(auth()->user()->candidat && auth()->user()->candidat->verif)
                    <form action="{{ route('candidat.candidature.store', ['id' => $offre->id]) }}" method="POST">
                        @csrf
                        <input type="submit" value="Apply">
                    </form>
                @endif
            @endif
        @else
        <a href="{{ route('login') }}">Connectez-vous pour postuler.</a>
        @endif

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
                    {{ number_format($offre->salaire, 0, '.', '') }} dt
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
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
          <div class="sidebar-border">
            <div class="sidebar-heading">
              <div class="avatar-sidebar">
                <a href="{{route('recruteur.show',['recruteur'=>$offre->recruteur])}}">
                    <figure><img alt="joblist" src="{{ asset('storage/' . $offre->recruteur->logo) }}"></figure>
                </a>
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
