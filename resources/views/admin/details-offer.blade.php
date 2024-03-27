@extends('admin.layouts.master')
@section('contents')
<section class="section">
        <div class="section-header">
          <h1>{{$offer->poste}}</h1>


          <div class="section-header-breadcrumb">
            @if ($offer->verif===null)
                <div class="badge badge-warning">
                    En Attente...
                </div>
            @endif
            @if ($offer->verif===1)
                <div class="badge badge-primary">
                    Publié
                </div>
            @endif
            @if ($offer->verif===0)
                <div class="badge badge-danger">
                    Refusé
                </div>
            @endif
          </div>
        </div>

        <div class="section-body">
          <div class="card">

            <div class="card-body">
                <h5>Description</h5>
                <p>{{$offer->description}}</p>
                <h5>Exigence</h5>
                <p>{{$offer->exigence}}</p>
                <h5>Salaire</h5>
                <p>{{$offer->salaire}}</p>
                <h5>Lieu</h5>
                <p>{{$offer->lieu}}</p>
                <h5>Date Fin Offre</h5>
                <p>{{$offer->date_fin_offre}}</p>
            </div>


            <div class="card-footer bg-whitesmoke" style="display: flex; justify-content: space-between; align-items: center;">
              <div>
                Recruteur: {{$offer->recruteur->nom_entreprise}}
                <br>
                Poste créé le :  {{$offer->created_at}}
              </div>

              <div>
                @if ($offer->verif===null)
                    <form action="{{route('admin.offers.accepter',['id'=>$offer->id])}}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('put')
                        <button class="btn btn-success" type="submit">Valider</button>
                    </form>
                    &nbsp
                    <form action="{{route('admin.offers.refuser',['id'=>$offer->id])}}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('put')
                        <button class="btn btn-danger" type="submit">Refuser </button>
                    </form>
                @endif
                @if ($offer->verif===1)
                    <form action="{{route('admin.offers.refuser',['id'=>$offer->id])}}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('put')
                        <button class="btn btn-danger" type="submit">Refuser </button>
                    </form>
                @endif
                @if ($offer->verif===0)
                    <form action="{{route('admin.offers.accepter',['id'=>$offer->id])}}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('put')
                        <button class="btn btn-success" type="submit">Valider</button>
                    </form>
                @endif



              </div>
            </div>
          </div>
        </div>
</section>
@endsection
