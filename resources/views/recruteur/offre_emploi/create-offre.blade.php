@extends('layouts.master')
@section('content')
<section class="section-box mt-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="box-nav-tabs nav-tavs-profile mb-5">
                    <ul class="nav" role="tablist">
                        <li><a class="btn btn-border mb-20" href="{{route('recruteur.create')}}">Profile</a></li>
                        <li><a class="btn btn-border mb-20" href="{{route('recruteur.dashboard')}}">Dashboard</a></li>
                        <li><a class="btn btn-border mb-20 active" href="{{route('recruteur.offre.create')}}">Creer Offre</a></li>
                        <li><a class="btn btn-border mb-20" href="{{route('recruteur.offre')}}">Liste Offre</a></li>
                        <li><a class="btn btn-border mb-20" href="{{route('recruteur.candidatures')}}">Candidatures</a></li>
                        <li><a class="btn btn-border mb-20" href="{{route('profile.edit')}}">Privacy Settings</a></li>
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


                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                    <form method="POST" action="{{ route('recruteur.offre.store') }}">
                        @csrf

                        <div class="content-single">
                            <h3 class="mt-0 mb-15 color-brand-1">Creer Offre</h3>

                            <div class="row form-contact">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-sm color-text-mutted mb-10">Poste *</label>
                                        <input name="poste" class="form-control @error('poste') is-invalid @enderror" type="text" value="{{ old('poste') }}">
                                        @error('poste')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-sm color-text-mutted mb-10">Date Expiration *</label>
                                        <input name="date_fin_offre" class="form-control @error('date_fin_offre') is-invalid @enderror" type="date" value="{{ old('date_fin_offre') }}">
                                        @error('date_fin_offre')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-sm color-text-mutted mb-10">Salaire</label>
                                        <input name="salaire" class="form-control @error('salaire') is-invalid @enderror" type="text" value="{{ old('salaire') }}">
                                        @error('salaire')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-sm color-text-mutted mb-10">Lieu</label>
                                        <input name="lieu" class="form-control @error('lieu') is-invalid @enderror" type="text" value="{{ old('lieu') }}">
                                        @error('lieu')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="font-sm color-text-mutted mb-10">Description de travail</label>
                                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description') }}</textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="font-sm color-text-mutted mb-10">exigence</label>
                                        <textarea name="exigence" class="form-control @error('exigence') is-invalid @enderror" rows="4">{{ old('exigence') }}</textarea>
                                        @error('exigence')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="box-button mt-15">
                                    <button type="submit" class="btn btn-apply-big font-md font-bold">Save All Changes</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
</section>
@endsection
