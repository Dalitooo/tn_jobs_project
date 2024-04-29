{{--
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('layouts.master')
@section('content')
<section class="pt-120 login-register">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 mx-auto">
          <div class="login-register-cover">
            <div class="text-center">
              <h2 class="mb-5 text-brand-1">Inscription</h2>
              <p class="font-sm text-muted mb-30"> Veuillez compléter le formulaire ci-dessous pour créer un compte</p>
            </div>


            <form class="login-register text-start mt-20" method="POST" action="{{ route('register') }}">
                @csrf
              <div class="row">

                <div class="col-xl-12">
                  <div class="form-group">
                    <label class="form-label" for="input-2">Email *</label>
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="input-2" type="email" required="" name="email"
                      placeholder="stevenjob@gmail.com" value="{{ old('email') }}">

                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                  </div>
                </div>

                <div class="col-xl-6">
                  <div class="form-group">
                    <label class="form-label" for="input-4">Mot de passe *</label>
                    <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="input-4" type="password" required="" name="password"
                      placeholder="************">

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

                  </div>
                </div>
                <div class="col-xl-6">
                  <div class="form-group">
                    <label class="form-label" for="input-5">Confirmer le mot de passe *</label>
                    <input class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" id="input-5" type="password" required="" name="password_confirmation"
                      placeholder="************">
                      <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                  </div>
                </div>

                <div class="col-12 mb-3">
                  <hr>
                  <h6 for="" class="mb-2">Créer un compte pour</h6>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="account_type" id="typeCandidate" value="candidat" >
                    <label class="form-check-label" for="typeCandidate">Candidat</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="account_type" id="typeCompany" value="recruteur">
                    <label class="form-check-label" for="typeCompany">Recruteur</label>
                  </div>

                  @if ($errors->has('account_type'))
                  <div class="invalid-feedback d-block">
                    {{ $errors->first('account_type') }}
                  </div>
                  @endif
                </div>
              <div class="form-group">
                <button class="btn btn-default hover-up w-100" type="submit" name="login">S'inscrire</button>
              </div>
              <div class="text-muted text-center">Vous avez déjà un compte? &nbsp;
                <a href="{{ route('login') }}">Connectez-vous</a>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="mt-120"></div>
@endsection
