@extends('layouts.master')

@section('content')


  <section class="pt-120 login-register">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 col-md-6 col-sm-12 mx-auto">
          <div class="login-register-cover">

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <div class="text-center">
              <h2 class="mb-5 text-brand-1">Connexion</h2>
              <p class="font-sm text-muted mb-30">Veuillez saisir vos identifiants valides.</p>
            </div>
            <form class="login-register text-start mt-20" method="POST" action="{{ route('login') }}">
                @csrf
              <div class="row">
                <div class="col-xl-12">
                  <div class="form-group">
                    <label class="form-label" for="input-3">Email *</label>
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="input-3" type="email" required="" name="email"
                      placeholder="stevenjob" value="{{ old('email') }}">

                      <x-input-error :messages="$errors->get('email')" class="mt-2" />
                  </div>
                </div>

                <div class="col-xl-12">
                  <div class="form-group">
                    <div class="d-flex justify-content-between">Mot de passe
                        <label class="form-label" for="input-4"> *</label>

                    </div>
                    <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="input-4" type="password" required="" name="password"
                      placeholder="************">
                    <a href="{{ route('password.request') }}">mot de passe oublié?</a>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

                  </div>
                </div>
              </div>
              <div class="form-group">
                <button class="btn btn-default hover-up w-100" type="submit" name="login">Se connecter</button>
              </div>
              <div class="text-muted text-center">Vous n'avez pas de compte ?
                <a href="{{ route('register') }}">Inscrivez-vous</a>
              </div>
            </form>
            {{-- <div class="text-center mt-20">
              <div class="divider-text-center"><span>Or continue with</span></div>
              <button class="btn social-login hover-up mt-20"><img src="assets/imgs/template/icons/icon-google.svg"
                  alt="joblist"><strong>Sign up with Google</strong></button>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="mt-120"></div>
@endsection
