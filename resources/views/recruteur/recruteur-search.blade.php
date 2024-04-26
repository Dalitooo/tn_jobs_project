@extends('layouts.master')
@section('content')
<section class="section-box mt-120">
    <div class="container">
      <div class="row flex-row-reverse">
        <div class="col-lg-9 col-md-12 col-sm-12 col-12 float-right">
            <div class="content-page company_page">
              <div class="box-filters-job">

              </div>
              <div class="row">
                @foreach ($recruteurs as $recruteur)
                @if ($recruteur->verif)

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                  <div class="card-grid-1 hover-up wow animate__ animate__fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
                    <div class="image-box"><a href="{{route('recruteur.show',['recruteur'=>$recruteur])}}"><img src="{{ asset('storage/' . $recruteur->logo) }}" alt="joblist"></a></div>
                    <div class="info-text mt-10">
                      <h5 class="font-bold"><a href="{{route('recruteur.show',['recruteur'=>$recruteur])}}">{{$recruteur->nom_entreprise}}</a></h5>
                      <div class="mt-5">
                      </div><span class="card-location">{{$recruteur->adresse}}</span>
                    </div>
                  </div>
                </div>
                @endif
                @endforeach



              </div>
            </div>
          </div>
        <div class="col-lg-3 col-md-12 col-sm-12 col-12">
          <div class="sidebar-shadow none-shadow mb-30">
            <div class="sidebar-filters">
              <div class="filter-block head-border mb-30">
                <h5>Chercher</h5>
              </div>
              <form class="filter-block mb-30" action="{{route('recruteur.search')}}" method="GET">
                <div class="form-group select-style">
                  <input type="text" name="search" class="form-control" placeholder="Chercher recruteur">
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
