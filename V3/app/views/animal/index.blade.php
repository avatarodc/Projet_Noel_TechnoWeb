<!-- app/views/animal/index.blade.php -->
@extends('layouts.app')

@section('header')
    Liste des Animaux
@endsection

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <div class="flex-1">
            <div class="relative">
                <input type="text" placeholder="Rechercher un animal..." 
                       class="w-full sm:w-64 pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-indigo-500">
                <div class="absolute left-3 top-2.5">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
            </div>
        </div>
        <a href="/animals/create" 
           class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg inline-flex items-center">
            <i class="fas fa-plus mr-2"></i> Ajouter un animal
        </a>
    </div>

    @if(empty($animals))
        <div class="bg-white rounded-lg shadow-sm p-6 text-center">
            <div class="text-gray-500 mb-4">
                <i class="fas fa-paw text-4xl mb-4"></i>
                <p class="text-xl">Aucun animal n'a été ajouté pour le moment.</p>
            </div>
            <a href="/animals/create" class="text-indigo-600 hover:text-indigo-800">
                Ajouter votre premier animal <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
    @else
        <div class="bg-white shadow-sm rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Age</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Santé</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Équipement</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($animals as $animal)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <i class="fas fa-paw text-gray-400 mr-3"></i>
                                        <div class="text-sm font-medium text-gray-900">{{ $animal->getType() }}</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $animal->getAge() }} ans</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        {{ $animal->getSante() == 'Bonne' ? 'bg-green-100 text-green-800' : 
                                           ($animal->getSante() == 'Moyenne' ? 'bg-yellow-100 text-yellow-800' : 
                                            'bg-red-100 text-red-800') }}">
                                        {{ $animal->getSante() }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($animal->getEquipement())
                                        <div class="flex items-center">
                                            <i class="fas fa-tools text-gray-400 mr-2"></i>
                                            <div class="text-sm text-gray-900">{{ $animal->getEquipement()->getNom() }}</div>
                                        </div>
                                    @else
                                        <span class="text-sm text-gray-500">Aucun équipement</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="/animals/{{ $animal->getId() }}/edit" 
                                       class="text-indigo-600 hover:text-indigo-900 mr-3">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="/animals/{{ $animal->getId() }}/delete" method="POST" class="inline">
                                        <button type="submit" 
                                                class="text-red-600 hover:text-red-900"
                                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet animal ?')">
                                            <i class="fas fa-trash"></i>
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