@extends('admin.layouts.master')
@section('contents')

<section class="section">
    <div class="section-header">
        <h1>Recruteurs</h1>
    </div>

    <div class="card">
        <div class="card-header">
          <h4>Recruteurs refusé</h4>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-striped" id="sortable-table">
              <thead>
                <tr>
                  <th>
                    Nom
                  </th>
                  <th>Prenom</th>
                  <th>Entreprise</th>
                  <th>Tel</th>
                  <th>Adresse</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="ui-sortable">
                @foreach ($recruteurs as $recruteur)
                <tr>
                    <td>
                        {{$recruteur->nom}}
                    </td>
                    <td>
                        {{$recruteur->prenom}}
                    </td>
                    <td class="align-middle">
                        {{$recruteur->nom_entreprise}}
                    </td>
                    <td>
                        {{$recruteur->tel}}
                    </td>
                    <td>
                        {{$recruteur->adresse}}
                    </td>
                    <td>
                        <div>
                            <button class="btn btn-info details-btn">
                                <a href="{{route('admin.recruteurs.details',['recruteur'=>$recruteur->id])}}">
                                    <i class="far fa-file-alt"></i>
                                </a>
                            </button>

                            <form action="{{route('admin.recruteurs.accepter',['id'=>$recruteur->id])}}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('put')
                                <button class="btn btn-success" type="submit">V</button>
                            </form>
                        </div>
                    </td>
                  </tr>

                @endforeach


              </tbody>
            </table>
          </div>
        </div>

    </div>

    <div class="mt-3 text-center">
        <nav role="navigation" aria-label="Pagination Navigation">
            <ul class="pagination">
                <li class="page-item">
                    <a href="{{ $recruteurs->previousPageUrl() }}" class="page-link" aria-label="Previous">
                        <span aria-hidden="true">Previous</span>
                    </a>
                </li>
                <li class="page-item">
                    <a href="{{ $recruteurs->nextPageUrl() }}" class="page-link" aria-label="Next">
                        <span aria-hidden="true">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>



</section>


@endsection
