@extends('admin.layouts.master')
@section('contents')
<section class="section">
    <div class="section-header">
        <h1>Offres</h1>
    </div>

    <div class="card">
        <div class="card-header">
          <h4>Offres En Attente...</h4>
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
                  <th class="text-center">
                    Entreprise
                  </th>
                  <th>Poste</th>
                  <th>Lieu</th>
                  <th>Salaire</th>
                  <th>Deadline</th>
                  <th>Créé le</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="ui-sortable">
                @foreach ($offers as $offer)
                <tr>
                    <td>
                        <div class="image-box">
                            <img src="{{ asset('storage/' . $offer->recruteur->logo)}}" alt="joblist" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
                        </div>
                    </td>
                    <td>
                        {{$offer->poste}}
                    </td>
                    <td class="align-middle">
                        {{$offer->lieu}}
                    </td>
                    <td>
                        {{$offer->salaire}}
                    </td>
                    <td>
                        {{$offer->date_fin_offre}}
                    </td>
                    <td>
                        {{$offer->created_at}}

                    </td>
                    <td>
                        <div>
                            <button class="btn btn-info details-btn">
                                <a href="{{route('admin.offers.details',['offer'=>$offer->id])}}">
                                    <i class="far fa-file-alt"></i>
                                </a>
                            </button>

                            <form action="{{route('admin.offers.accepter',['id'=>$offer->id])}}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('put')
                                <button class="btn btn-success" type="submit">V</button>
                            </form>
                            <form action="{{route('admin.offers.refuser',['id'=>$offer->id])}}" method="POST" style="display: inline-block;">
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
                    <a href="{{ $offers->previousPageUrl() }}" class="page-link" aria-label="Previous">
                        <span aria-hidden="true">Previous</span>
                    </a>
                </li>
                <li class="page-item">
                    <a href="{{ $offers->nextPageUrl() }}" class="page-link" aria-label="Next">
                        <span aria-hidden="true">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

</section>



@endsection
