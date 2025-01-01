@extends('layouts.app')

@section('header')
    <div class="flex items-center">
        <i class="fas fa-plus-circle text-indigo-500 mr-3"></i>
        Ajouter un nouvel équipement
    </div>
@endsection

@section('content')
    @include('equipment.partials.form', [
        'action' => '/equipment',
        'submitText' => 'Ajouter l\'équipement'
    ])
@endsection