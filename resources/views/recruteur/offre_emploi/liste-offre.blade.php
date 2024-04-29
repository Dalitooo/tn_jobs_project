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
                        <li><a class="btn btn-border mb-20" href="{{route('recruteur.offre.create')}}">Creer Offre</a></li>
                        <li><a class="btn btn-border mb-20  active" href="{{route('recruteur.offre')}}">Liste Offre</a></li>
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

            <div class="col-lg-9 col-md-12 col-sm-12 col-12 float-right">
                <div class="content-page">
                  <div class="box-filters-job">

                  </div>
                  <div class="row display-list">
                    <div>
                        @if(session()->has('success'))
                            <div>
                                {{session('success')}}
                            </div>
                        @endif
                        @if($myOffres->isEmpty())
                        <div>
                            Aucune Offre.
                        </div>
                        @endif
                    </div>
                    @foreach ($myOffres as $offre )
                    <div class="col-xl-12 col-12">
                        <div class="card-grid-2 hover-up"><span class="flash"></span>
                          <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                              <div class="card-grid-2-image-left">
                                <div class="image-box"><img src="{{ asset('storage/' . auth()->user()->recruteur->logo) }}" alt="joblist"></div>
                                <div class="right-info"><a class="name-job" href="{{route('recruteur.show',['recruteur'=>$offre->recruteur])}}">{{$offre->recruteur->nom_entreprise}}</a><span class="location-small">{{$offre->lieu}}</span></div>
                              </div>
                            </div>
                            <div class="col-lg-6 text-start text-md-end pr-60 col-md-6 col-sm-12">
                              <div class="pl-15 mb-15 mt-30">

                                @if($offre->verif === null)
                                <p class="btn btn-grey-small mr-5">Pending...</p></div>
                                @elseif($offre->verif === 1)
                                <p class="btn btn-grey-small mr-5">Verifié</p></div>
                            @elseif($offre->verif === 0)
                                <p class="btn btn-grey-small mr-5">Not Verified</p></div>
                            @endif

                            </div>
                          </div>
                          <div class="card-block-info">
                            <h4><a href="{{route('recruteur.offre.edit',['offre'=>$offre])}}">{{$offre->poste}}</a></h4>
                            <div class="mt-5"><span class="card-time"><span> {{$offre->updated_at}}</span></span></div>
                            <p class="font-sm color-text-paragraph mt-10">
                                {{$offre->description}}
                            </p>
                            <div class="card-2-bottom mt-20">
                              <div class="row">
                                <div class="col-lg-7 col-7"><span class="card-text-price">{{$offre->salaire}} dt</span></div>
                                <div class="col-lg-5 col-5 text-end">
                                  <div class="btn btn-apply-now">
                                    <a href="{{route('recruteur.offre.edit',['offre'=>$offre])}}">Update</a>
                                  </div>
                                  &nbsp;
                                  &nbsp;
                                  <div class="btn btn-apply-now" style="background-color: red;">
                                    <form method="post" action="{{route('recruteur.offre.destroy', ['offre' => $offre])}}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit">Delete</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach


                  </div>
                </div>
                {{ $myOffres->links() }}

              </div>
        </div>
    </div>
</section>
@endsection
