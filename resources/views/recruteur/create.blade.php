@extends('layouts.master')
@section('content')
<section class="section-box mt-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="box-nav-tabs nav-tavs-profile mb-5">
                    <ul class="nav" role="tablist">
                        <li><a class="btn btn-border mb-20 active" href="{{route('recruteur.create')}}">Profile</a></li>
                        <li><a class="btn btn-border mb-20" href="{{route('recruteur.dashboard')}}">Dashboard</a></li>
                        <li><a class="btn btn-border mb-20" href="{{route('recruteur.offre.create')}}">Creer Offre</a></li>
                        <li><a class="btn btn-border mb-20" href="{{route('recruteur.offre.index')}}">Liste Offre</a></li>
                        <li><a class="btn btn-border mb-20" href="candidate-profile-save-jobs.html">Candidatures</a></li>
                        <li><a class="btn btn-border mb-20" href="">Privacy Settings</a></li>
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
                <div class="row">
                    <div class="col-12 mt-30">
                        <div class="dash_alert_box p-30 bg-danger rounded-4 d-flex flex-wrap">
                            <div class="text">
                                <h4>Setup your profile !</h4>
                                <p>Please fill in all the necessary information to complete your profile. This will help us provide you with a better experience on our platform.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="content-single">
                    <h3 class="mt-0 mb-15 color-brand-1">My Account</h3>
                    <br>
                    <form action="{{ route('recruteur.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row form-contact">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10" for="nom">Nom</label>
                                    <input class="form-control" type="text" id="nom" name="nom" value="{{  $recruteur->nom ??  old('nom') }}">
                                    @error('nom')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10" for="prenom">Prenom</label>
                                    <input class="form-control" type="text" name="prenom" id="prenom" value="{{ $recruteur->prenom ??  old('prenom') }}">
                                    @error('prenom')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10" for="nom_entreprise">Nom d'entreprise</label>
                                    <input class="form-control" type="text" id="nom_entreprise" name="nom_entreprise" value="{{ $recruteur->nom_entreprise ?? old('nom_entreprise') }}">
                                    @error('nom_entreprise')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10" for="Adresse">Adresse</label>
                                    <input class="form-control" type="text" name="adresse" id="adresse" value="{{$recruteur->adresse ?? old('adresse') }}">
                                    @error('adresse')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                  <label class="font-sm color-text-mutted mb-10">Bio</label>
                                  <textarea class="form-control" rows="4" name="bio"> {{ $recruteur->bio ?? old('bio') }} </textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10" for="tel">Telephone</label>
                                    <input class="form-control" type="text" id="tel" name="tel" placeholder="Steven Job" value="{{ $recruteur->tel ?? old('tel') }}">
                                    @error('tel')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10" for="image">Image</label>
                                    @if($recruteur ?? null && $recruteur->logo)
                                        <p>Current Image: <img src="{{ asset('storage/' . $recruteur->logo) }}" alt="Current Image"></p>
                                        <input class="form-control" type="file" name="logo" id="image">
                                    @else
                                        <input class="form-control" type="file" name="logo" id="image" required>
                                    @endif
                                    @error('logo')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="box-button mt-15">
                                <button type="submit" class="btn btn-apply-big font-md font-bold">Save All Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
