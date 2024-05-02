<section class="section-box futured_jobs mt-10">
    <div class="container">
      <div class="text-center">
        <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Dernières Offres d'emploi</h2>

      </div>
      <div class="mt-70">
        <div class="tab-content" id="myTabContent-1">
          <div class="tab-pane fade show active" id="tab-job-1" role="tabpanel" aria-labelledby="tab-job-1">
            <div class="row">
            @foreach ($offres as $offre )
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="card-grid-2 hover-up">
                  <div class="card-grid-2-image-left"><span class="flash"></span>
                    <div class="image-box"><img src="{{ asset('storage/' . $offre->recruteur->logo) }}" alt="joblist"></div>
                  </div>
                  <div class="card-block-info">
                    <h6><a href="{{route('offre.show',['offre'=>$offre])}}">{{$offre->poste}}</a></h6>
                    <div class="mt-5"><span class="card-time"><span>créé : &nbsp;
                          {{$offre->created_at}}</span></span></div>
                    <p class="font-sm color-text-paragraph mt-15">
                        {{$offre->description}}
                    </p>
                  </div>
                  <span class="card-text-price">{{ number_format($offre->salaire, 0, '.', '') }}<b>dt</b> </span>

                    <a class="btn btn-apply-now" href="{{route('offre.show',['offre'=>$offre])}}">
                        Voir Plus
                    </a>

                </div>
              </div>
            @endforeach

            </div>
          </div>
        </div>
      </div>
      <div class="text-center mt-4">
        <a href="{{route('offre.index')}}" class="btn btn-outline-yellow btn-lg">
            Voir toutes les offres d'emploi
            <style>
                .btn-outline-yellow {
                    color: #ffc107;
                    border-color: #ffc107;
                }

                .btn-outline-yellow:hover {
                    color: #fff;
                    background-color: #ffc107;
                    border-color: #ffc107;
                }
            </style>
        </a>
    </div>
    </div>
  </section>
