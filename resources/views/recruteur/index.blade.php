@extends('layouts.master')
@section('content')
<section class="section-box mt-120">
    <div class="container">
      <div class="row flex-row-reverse">
        <div class="col-lg-9 col-md-12 col-sm-12 col-12 float-right">
            <div class="content-page company_page">
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
            <div class="paginations">
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
        <div class="col-lg-3 col-md-12 col-sm-12 col-12">
          <div class="sidebar-shadow none-shadow mb-30">
            <div class="sidebar-filters">
              <div class="filter-block head-border mb-30">
                <h5>Chercher</h5>
              </div>
              <form class="filter-block mb-30" action="{{route('recruteur.search')}}" method="GET">
                <div class="form-group select-style">
                  <input type="text" name="search" class="form-control" placeholder="chercher offre">
                  <button class="submit btn btn-default mt-10 rounded-1 w-100" type="submit">chercher</button>
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
