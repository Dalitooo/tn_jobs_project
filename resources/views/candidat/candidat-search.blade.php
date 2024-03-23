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
                          <input type="text" name="search" class="form-control" placeholder="search">
                          <button class="submit btn btn-default mt-10 rounded-1 w-100" type="submit">chercher candidats</button>
                        </div>
                      </form>


                  </div>
                </div>
              </div>
            <div class="col-xl-9">
              <div class="box-filters-job">
                <div class="row">
                  <div class="col-xl-6 col-lg-5"><span class="text-small text-showing">Showing <strong>41-60 </strong>of
                      <strong>944 </strong>jobs</span></div>
                  <div class="col-xl-6 col-lg-7 text-lg-end mt-sm-15">
                    <div class="display-flex2">
                      <div class="box-border mr-10"><span class="text-sortby">Show:</span>
                        <div class="dropdown dropdown-sort">
                          <button class="btn dropdown-toggle" id="dropdownSort" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"><span>12</span><i class="fi-rr-angle-small-down"></i></button>
                          <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownSort">
                            <li><a class="dropdown-item active" href="#">10</a></li>
                            <li><a class="dropdown-item" href="#">12</a></li>
                            <li><a class="dropdown-item" href="#">20</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="box-border"><span class="text-sortby">Sort by:</span>
                        <div class="dropdown dropdown-sort">
                          <button class="btn dropdown-toggle" id="dropdownSort2" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"><span>Newest Post</span><i class="fi-rr-angle-small-down"></i></button>
                          <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownSort2">
                            <li><a class="dropdown-item active" href="#">Newest Post</a></li>
                            <li><a class="dropdown-item" href="#">Oldest Post</a></li>
                            <li><a class="dropdown-item" href="#">Rating Post</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                @foreach ($candidats as $candidat )

                    <div class="col-lg-4 col-md-6">
                    <div class="card-grid-2 hover-up">
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
                @endforeach


                </div>
                <div class="col-12">
                  <div class="paginations mt-35">
                    <ul class="pager">
                      <li><a class="pager-prev" href="#"><i class="fas fa-arrow-left"></i></a></li>
                      <li><a class="pager-number" href="#">1</a></li>
                      <li><a class="pager-number" href="#">2</a></li>
                      <li><a class="pager-number active" href="#">3</a></li>
                      <li><a class="pager-number" href="#">4</a></li>
                      <li><a class="pager-next" href="#"><i class="fas fa-arrow-right"></i></a></li>
                    </ul>
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
