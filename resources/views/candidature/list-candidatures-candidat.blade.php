@extends('layouts.master')
@section('content')
<section class="section-box mt-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="box-nav-tabs nav-tavs-profile mb-5">
                    <ul class="nav" role="tablist">
                        <li><a class="btn btn-border mb-20" href="{{route('candidat.create')}}">Profile</a></li>
                        <li><a class="btn btn-border mb-20" href="{{route('candidat.dashboard')}}">Dashboard</a></li>
                        <li><a class="btn btn-border mb-20 active" href="{{route('candidat.candidatures')}}">Mes Candidatures</a></li>
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

            <div class="col-lg-9 col-md-12 col-sm-12 col-12 float-right">

                <div class="content-page">
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
                  <div class="row display-list">
                    <div>
                        @if(session()->has('success'))
                            <div>
                                {{session('success')}}
                            </div>
                        @endif
                    </div>


                      </div>
                  </div>


                  <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                      <tr style="background-color: #f2f2f2;">
                        <th style="padding: 8px; border-bottom: 1px solid #ddd;">ID</th>
                        <th style="padding: 8px; border-bottom: 1px solid #ddd;">Poste</th>
                        <th style="padding: 8px; border-bottom: 1px solid #ddd;">Result</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ( $candidatures as $candidature )
                      <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 8px;">{{$candidature->id}}</td>
                        <td style="padding: 8px;">
                            <a href="{{route('offre.show',['offre'=>$candidature->offreEmploi])}}">{{$candidature->offreEmploi->poste}}</a>
                        </td>
                        <td style="padding: 8px;">
                        @if ($candidature->result === null)
                            En attente
                        @elseif ($candidature->result === 0)
                            Refusé
                        @elseif ($candidature->result === 1)
                            Accepté
                        @endif
                        </td>

                      </tr>
                    @endforeach

                    </tbody>
                  </table>

                </div>

              </div>
        </div>
    </div>
</section>
@endsection
