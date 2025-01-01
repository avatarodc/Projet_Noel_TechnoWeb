@extends('layouts.app')

@section('header')
    <div class="flex items-center">
        <i class="fas fa-edit text-indigo-500 mr-3"></i>
        Modifier l'animal
    </div>
@endsection

@section('content')
    @include('animal.partials.form', [
        'action' => '/animals/' . $animal->getId(),
        'submitText' => 'Mettre à jour l\'animal',
        'animal' => $animal
    ])
@endsection