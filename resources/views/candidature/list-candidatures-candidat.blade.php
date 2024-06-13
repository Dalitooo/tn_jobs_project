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
                        <th style="padding: 8px; border-bottom: 1px solid #ddd;">Resultat</th>
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
                        <a href="{{ route('candidat.candidatures.refused', $candidature) }}" style="display: inline-block; padding: 8px 15px; font-size: 14px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 3px;">Voir résultat</a>
                        @elseif ($candidature->result === 1)
                        <a href="{{ route('candidat.candidatures.accepted', $candidature) }}" style="display: inline-block; padding: 8px 15px; font-size: 14px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 3px;">Voir résultat</a>
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
<div class="mt-110"></div>

@endsection
