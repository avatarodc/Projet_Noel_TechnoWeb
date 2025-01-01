<!-- app/views/equipment/index.blade.php -->
@extends('layouts.app')

@section('header')
    <div class="flex justify-between items-center">
        <div class="flex items-center">
            <i class="fas fa-tools text-indigo-500 mr-3"></i>
            Liste des Équipements
        </div>
        <a href="/equipment/create" 
           class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <i class="fas fa-plus mr-2"></i>
            Ajouter un équipement
        </a>
    </div>
@endsection

@section('content')
    @if(empty($equipments))
        <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-4 rounded">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="fas fa-info-circle text-blue-400"></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-blue-700">
                        Aucun équipement n'a été ajouté pour le moment.
                    </p>
                </div>
            </div>
        </div>
    @else
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nom
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                État
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Disponibilité
                            </th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($equipments as $equipment)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <i class="fas fa-tools text-gray-400 mr-3"></i>
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $equipment->getNom() }}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{ $equipment->getEtat() }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($equipment->getDisponibilite())
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            <i class="fas fa-check-circle mr-1"></i>
                                            Disponible
                                        </span>
                                    @else
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            <i class="fas fa-times-circle mr-1"></i>
                                            Non disponible
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="/equipment/{{ $equipment->getId() }}/edit" 
                                       class="text-indigo-600 hover:text-indigo-900 mr-3">
                                        <i class="fas fa-edit"></i>
                                        <span class="ml-1">Modifier</span>
                                    </a>
                                    <form action="/equipment/{{ $equipment->getId() }}/delete" 
                                          method="POST" 
                                          class="inline-block">
                                        <button type="submit" 
                                                class="text-red-600 hover:text-red-900"
                                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet équipement ?')">
                                            <i class="fas fa-trash"></i>
                                            <span class="ml-1">Supprimer</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection