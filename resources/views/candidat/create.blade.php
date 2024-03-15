@extends('layouts.master')
@section('content')
<section class="section-box mt-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="box-nav-tabs nav-tavs-profile mb-5">
                    <ul class="nav" role="tablist">
                        <li><a class="btn btn-border mb-20 active" href="{{route('candidat.create')}}">Profile</a></li>
                        <li><a class="btn btn-border mb-20" href="{{route('candidat.dashboard')}}">Dashboard</a></li>
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
                    <a class="font-md color-text-paragraph-2" href="#">Update your profile</a>
                    <br>
                    <form action="{{ route('candidat.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row form-contact">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10" for="nom">Nom</label>
                                    <input class="form-control" type="text" id="nom" name="nom" value="{{ old('nom') }}">
                                    @error('nom')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10" for="prenom">Prenom</label>
                                    <input class="form-control" type="text" name="prenom" id="prenom" value="{{ old('prenom') }}">
                                    @error('prenom')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10" for="profession">Profession</label>
                                    <input class="form-control" type="text" name="profession" id="profession" value="{{ old('profession') }}">
                                    @error('profession')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Add error messages for other fields as needed -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10" for="tel">Telephone</label>
                                    <input class="form-control" type="text" id="tel" name="tel" placeholder="Steven Job" value="{{ old('tel') }}">
                                    @error('tel')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10" for="cv">CV</label>
                                    <input class="form-control" type="file" name="cv" id="cv">
                                    @error('cv')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10" for="date_naissance">Date De Naissaince</label>
                                    <input class="form-control" type="date" name="date_naiss" id="date_naissance" value="{{ old('date_naiss') }}">
                                    @error('date_naiss')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10" for="image">Image</label>
                                    <input class="form-control" type="file" id="image" name="image">
                                    @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10">Gender</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="femmeCheckbox" name="genre" value="Femme">
                                        <label class="form-check-label" for="femmeCheckbox">Femme</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="hommeCheckbox" name="genre" value="Homme">
                                        <label class="form-check-label" for="hommeCheckbox">Homme</label>
                                    </div>
                                    @error('genre')
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
