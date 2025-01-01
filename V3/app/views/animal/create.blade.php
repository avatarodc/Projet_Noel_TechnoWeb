@extends('layouts.app')

@section('header')
    <div class="flex items-center">
        <i class="fas fa-plus-circle text-indigo-500 mr-3"></i>
        Ajouter un nouvel animal
    </div>
@endsection

@section('content')
    @include('animal.partials.form', [
        'action' => '/animals',
        'submitText' => 'Ajouter l\'animal'
    ])
@endsection