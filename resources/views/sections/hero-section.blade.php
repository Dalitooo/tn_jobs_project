<section class="section-box mt-100 mb-100 banner_section">
    <div class="container">
      <div class="banner-hero hero-1">
        <div class="banner-inner">
          <div class="row align-items-center">
            <div class="col-xl-4 col-lg-12 d-none d-xl-block col-md-6">
              <div class="banner-imgs mt-4">
                <div class=""><img class="img-responsive" alt="joblist"
                    src={{asset('assets/imgs/interview.svg')}}></div>
              </div>
            </div>
            <div class="col-xl-8 col-lg-12">
              <div class="block-banner">
                <h1 class="heading-banner wow animate__animated animate__fadeInUp">
                    Découvrez des opportunités passionnantes avec nous !
                </h1>
                <div class="banner-description mt-20 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    Explorez une variété d'emplois disponibles
                </div>
                <div class="form-find mt-40 wow animate__ animate__fadeIn animated" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
                    <form action="{{route('offre.search')}}" method="GET">
                      <input class="form-input input-keysearch mr-10" type="text" name="search" placeholder="mot clés... ">
                      <button class="btn btn-default btn-find font-sm">Chercher</button>
                    </form>
                  </div>



              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
