@extends('admin.layouts.master')
@section('contents')
<section class="section">
    <div class="section-header">
      <h1>Profile Candidat</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Profile</div>
      </div>
    </div>
    <div class="section-body">
          <div class="card profile-widget">
            <div class="profile-widget-header">
              <div class="profile-widget-items">

                <div class="profile-widget-item">
                    <div class="profile-widget-item-value">
                        @if ($candidat->verif===null)
                        <div class="badge badge-warning">
                            En Attente...
                        </div>
                        @endif
                        @if ($candidat->verif===true)
                        <div class="badge badge-primary">
                            Verifié
                        </div>
                        @endif
                        @if ($candidat->verif===false)
                        <div class="badge badge-danger">
                            Refusé
                        </div>
                        @endif
                    </div>
                </div>
              </div>
            </div>
            <div class="profile-widget-description">
                <div class="profile-info" style="display: flex;">
                    <div class="profile-image" style="margin-right: 20px;">
                        <img src="{{ asset('storage/' . $candidat->image)}}" alt="Profile Image" style="width: 200px; height: 200px; border: 2px solid #ccc;">
                    </div>
                    <div class="profile-details">

                        <div class="profile-name"><b>Nom et Prenom : </b> {{$candidat->prenom}} {{$candidat->nom}} </div>
                        <div class="profile-profession"> <b>Profession : </b> {{$candidat->profession}}</div>
                        <div class="profile-bio">
                            <b>Biography:</b>
                            <p>{{$candidat->bio}}</p>
                        </div>
                        <div class="profile-other-details">
                            <b>Genre:</b> {{$candidat->genre}}<br>
                            <b>Telephone:</b> {{$candidat->tel}}<br>
                            <b>Date De Naissaince:</b> {{$candidat->date_naiss}}<br>
                            <br>
                            <a href="{{ route('candidat.downloadCV', $candidat) }}" class="badge badge-warning" style="background-color: blue; color: white;">Télécharger CV</a>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-whitesmoke" style="display: flex; justify-content: space-between; align-items: center;">
                    <div>
                      <br>
                     créé le :  {{$candidat->created_at}}
                    </div>

                    <div>
                      @if ($candidat->verif===null)
                          <form action="{{route('admin.candidats.accepter',['id'=>$candidat->id])}}" method="POST" style="display: inline-block;">
                              @csrf
                              @method('put')
                              <button class="btn btn-success" type="submit">Valider</button>
                          </form>
                          &nbsp
                          <form action="{{route('admin.candidats.refuser',['id'=>$candidat->id])}}" method="POST" style="display: inline-block;">
                              @csrf
                              @method('put')
                              <button class="btn btn-danger" type="submit">Refuser </button>
                          </form>
                      @endif
                      @if ($candidat->verif===true)
                          <form action="{{route('admin.candidats.refuser',['id'=>$candidat->id])}}" method="POST" style="display: inline-block;">
                              @csrf
                              @method('put')
                              <button class="btn btn-danger" type="submit">Refuser </button>
                          </form>
                      @endif
                      @if ($candidat->verif===false)
                          <form action="{{route('admin.candidats.accepter',['id'=>$candidat->id])}}" method="POST" style="display: inline-block;">
                              @csrf
                              @method('put')
                              <button class="btn btn-success" type="submit">Valider</button>
                          </form>
                      @endif



                    </div>
                  </div>
            </div>




      </div>
    </div>
  </section>
@endsection
