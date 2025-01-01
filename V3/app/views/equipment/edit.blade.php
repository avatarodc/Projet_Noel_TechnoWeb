@extends('layouts.app')

@section('header')
    <div class="flex items-center">
        <i class="fas fa-edit text-indigo-500 mr-3"></i>
        Modifier l'équipement
    </div>
@endsection

@section('content')
    @include('equipment.partials.form', [
        'action' => '/equipment/' . $equipment->getId(),
        'submitText' => 'Mettre à jour l\'équipement',
        'equipment' => $equipment
    ])
@endsection