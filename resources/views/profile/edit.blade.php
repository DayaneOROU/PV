@extends('layout')

@section('title', 'Mon Profil - ENEAM')
@section('heading', 'Mon Profil')
@section('subheading', 'Gérer vos informations personnelles et paramètres de compte')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">
    <div class="p-4 sm:p-8 bg-white shadow-sm rounded-xl border border-gray-100">
        <div class="max-w-xl">
            @include('profile.partials.update-profile-information-form')
        </div>
    </div>

    <div class="p-4 sm:p-8 bg-white shadow-sm rounded-xl border border-gray-100">
        <div class="max-w-xl">
            @include('profile.partials.update-password-form')
        </div>
    </div>

    <div class="p-4 sm:p-8 bg-white shadow-sm rounded-xl border border-gray-100">
        <div class="max-w-xl">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection
