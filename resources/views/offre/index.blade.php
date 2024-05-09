@extends('layouts.master')
@section('content')
<section class="section-box mt-120">
    <div class="container">
      <div class="row flex-row-reverse">
        <div class="col-lg-9 col-md-12 col-sm-12 col-12 float-right">
          <div class="content-page">
            <div class="box-filters-job">
            </div>
            <div class="row display-list">

                @foreach ($offres as $offre )
                    @if ($offre->verif)
                        <div class="col-xl-12 col-12">
                            <div class="card-grid-2 hover-up"><span class="flash"></span>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="card-grid-2-image-left">
                                    <div class="image-box"><img src="{{ asset('storage/' . $offre->recruteur->logo) }}" alt="joblist"></div>
                                    <div class="right-info"><a class="name-job" href="{{route('recruteur.show',['recruteur'=>$offre->recruteur])}}">{{$offre->recruteur->nom_entreprise}}</a><span class="location-small">{{$offre->lieu}}</span></div>
                                </div>
                                </div>

                            </div>
                            <div class="card-block-info">
                                <h4><a href="{{route('offre.show',['offre'=>$offre])}}">{{$offre->poste}}</a></h4>
                                <div class="mt-5"><span class="card-time"><span> {{$offre->updated_at}}</span></span></div>
                                <p class="font-sm color-text-paragraph mt-10">
                                    {{$offre->description}}
                                </p>
                                <div class="card-2-bottom mt-20">
                                <div class="row">
                                    <div class="col-lg-7 col-7"><span class="card-text-price">{{ number_format($offre->salaire, 0, '.', '') }} dt</span></div>
                                    <div class="col-lg-5 col-5 text-end">
                                        <div class="btn btn-apply-now" style="text-align: center;">
                                            <a href="{{route('offre.show',['offre'=>$offre])}}" style="display: inline-block; color: inherit; text-decoration: inherit;">Voir Plus</a>
                                        </div>
                                      </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    @endif

                @endforeach

            </div>
          </div>
          {{ $offres->links() }}
        </div>
        <div class="col-lg-3 col-md-12 col-sm-12 col-12">
          <div class="sidebar-shadow none-shadow mb-30">
            <div class="sidebar-filters">
              <div class="filter-block head-border mb-30">
                <h5>Chercher</h5>
              </div>
              <form class="filter-block mb-30" action="{{route('offre.search')}}" method="GET">
                <div class="form-group select-style">
                  <input type="text" name="search" class="form-control" placeholder="chercher offre">
                  <button class="submit btn btn-default mt-10 rounded-1 w-100" type="submit">Chercher</button>
                </div>
              </form>


            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="mt-120"></div>

@endsection
