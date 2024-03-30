@extends('admin.layouts.master')
@section('contents')

<section class="section">
    <div class="section-header">
        <h1>Candidats En Attente...</h1>
    </div>

    <div class="card">
        <div class="card-header">
          <h4>Pending Candidats</h4>
          <div class="card-header-action">
            <form>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search">
                <div class="input-group-btn">
                  <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </form>
          </div>
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
                  <th>Profession</th>
                  <th>Tel</th>
                  <th>Date De Naissance</th>
                  <th>CV</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="ui-sortable">
                @foreach ($candidats as $candidat)
                <tr>
                    <td>
                        {{$candidat->nom}}
                    </td>
                    <td>
                        {{$candidat->prenom}}
                    </td>
                    <td class="align-middle">
                        {{$candidat->profession}}
                    </td>
                    <td>
                        {{$candidat->tel}}
                    </td>
                    <td>
                        {{$candidat->date_naiss}}
                    </td>
                    <td>
                        <a href="{{ route('candidat.downloadCV', $candidat) }}">Download CV</a>
                    </td>
                    <td>
                        <div>
                            <button class="btn btn-info details-btn">
                                <a href="{{route('admin.candidats.details',['candidat'=>$candidat->id])}}">
                                    <i class="far fa-file-alt"></i>
                                </a>
                            </button>

                            <form action="{{route('admin.candidats.accepter',['id'=>$candidat->id])}}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('put')
                                <button class="btn btn-success" type="submit">V</button>
                            </form>
                            <form action="{{route('admin.candidats.refuser',['id'=>$candidat->id])}}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('put')
                                <button class="btn btn-danger" type="submit">R</button>
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
                    <a href="{{ $candidats->previousPageUrl() }}" class="page-link" aria-label="Previous">
                        <span aria-hidden="true">Previous</span>
                    </a>
                </li>
                <li class="page-item">
                    <a href="{{ $candidats->nextPageUrl() }}" class="page-link" aria-label="Next">
                        <span aria-hidden="true">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>



</section>


@endsection
