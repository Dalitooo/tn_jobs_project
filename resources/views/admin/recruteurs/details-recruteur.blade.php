@extends('admin.layouts.master')
@section('contents')
<section class="section">
    <div class="section-header">
      <h1>Profile recruteur</h1>
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
                        @if ($recruteur->verif===null)
                        <div class="badge badge-warning">
                            En Attente...
                        </div>
                        @endif
                        @if ($recruteur->verif===true)
                        <div class="badge badge-primary">
                            Verifié
                        </div>
                        @endif
                        @if ($recruteur->verif===false)
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
                        <img src="{{ asset('storage/' . $recruteur->logo)}}" alt="Profile Image" style="width: 200px; height: 200px; border: 2px solid #ccc;">
                    </div>
                    <div class="profile-details">

                        <div class="profile-name"><b>Entreprise : </b> {{$recruteur->nom_entreprise}}</div>
                        <div class="profile-profession"> <b>Owner : </b> {{$recruteur->prenom}} {{$recruteur->nom}} </div>
                        <div class="profile-bio">
                            <b>Biography:</b>
                            <p>{{$recruteur->bio}}</p>
                        </div>
                        <div class="profile-other-details">
                            <b>Adresse:</b> {{$recruteur->adresse}}<br>
                            <b>Telephone:</b> {{$recruteur->tel}}<br>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-whitesmoke" style="display: flex; justify-content: space-between; align-items: center;">
                    <div>
                      <br>
                     créé le :  {{$recruteur->created_at}}
                    </div>

                    <div>
                      @if ($recruteur->verif===null)
                          <form action="{{route('admin.recruteurs.accepter',['id'=>$recruteur->id])}}" method="POST" style="display: inline-block;">
                              @csrf
                              @method('put')
                              <button class="btn btn-success" type="submit">Valider</button>
                          </form>
                          &nbsp
                          <form action="{{route('admin.recruteurs.refuser',['id'=>$recruteur->id])}}" method="POST" style="display: inline-block;">
                              @csrf
                              @method('put')
                              <button class="btn btn-danger" type="submit">Refuser </button>
                          </form>
                      @endif
                      @if ($recruteur->verif===true)
                          <form action="{{route('admin.recruteurs.refuser',['id'=>$recruteur->id])}}" method="POST" style="display: inline-block;">
                              @csrf
                              @method('put')
                              <button class="btn btn-danger" type="submit">Refuser </button>
                          </form>
                      @endif
                      @if ($recruteur->verif===false)
                          <form action="{{route('admin.recruteurs.accepter',['id'=>$recruteur->id])}}" method="POST" style="display: inline-block;">
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
