@extends('admin.layouts.master')
@section('contents')
<section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon">
            <a href="{{route('admin.candidats.pending')}}">
                <img src="{{ asset('storage/images/employe.png')}}" style="max-width: 50px; max-height: 100px;" >
            </a>
        </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Candidats</h4>
            </div>
            <div class="card-body">
              {{$totalCandidat}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon">
            <a href="{{ route('admin.recruteurs.pending') }}">
                <img src="{{ asset('storage/images/homme-daffaire.png')}}" style="max-width: 50px; max-height: 100px;" >
            </a>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Recruteurs</h4>
            </div>
            <div class="card-body">
                {{$totalRecruteur}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon">
            <a href="{{route('admin.offers.pending')}}">
                <img src="{{ asset('storage/images/offre.png')}}" style="max-width: 50px; max-height: 100px;" >
            </a>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Offers</h4>
            </div>
            <div class="card-body">
                {{$totalOffre}}
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
@endsection

{{--
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
