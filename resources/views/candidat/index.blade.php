@extends('layouts.master')
@section('content')
<section class="section-box mt-120">
    <div class="container">
        <div class="content-page">

          <div class="row">
            <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="sidebar-shadow none-shadow mb-30">
                  <div class="sidebar-filters">
                    <div class="filter-block head-border mb-30">
                      <h5>Chercher</h5>
                    </div>
                    <form class="filter-block mb-30" action="{{ route('candidat.search') }}" method="GET">
                      <div class="form-group select-style">
                        <input type="text" name="search" class="form-control" placeholder="chercher candidat">
                        <button class="submit btn btn-default mt-10 rounded-1 w-100" type="submit">Chercher</button>
                      </div>
                    </form>


                  </div>
                </div>
              </div>
            <div class="col-xl-9">
              <div class="box-filters-job">
              </div>
              <div class="row">
                @foreach ($candidats as $candidat )

                     @if ($candidat->verif)

                        <div class="col-lg-4 col-md-6">
                        <div class="card-grid-2 hover-up text-center">
                            <div class="card-grid-2-image-left">
                            <div class="card-grid-2-image-rd"><a href="{{route('candidat.show',['candidat'=>$candidat])}}">
                                <figure><img alt="joblist" src="{{ asset('storage/' . $candidat->image) }}"></figure>
                                </a></div>
                            <div class="card-profile pt-10">
                                <a href="{{route('candidat.show',['candidat'=>$candidat])}}">
                                <h5>{{$candidat->prenom}} {{$candidat->nom}}</h5>
                                </a>
                                <span class="font-xs color-text-mutted">{{$candidat->profession}}</span>
                            </div>
                            </div>
                            <div class="card-block-info">
                            <p class="font-xs color-text-paragraph-2">{{$candidat->bio}}</p>

                            </div>
                        </div>
                        </div>

                    @endif

                @endforeach


                </div>
                <div class="col-12">
                  <div class="paginations mt-35">
                    {{$candidats->links()}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
  <div class="mt-120"></div>

@endsection
