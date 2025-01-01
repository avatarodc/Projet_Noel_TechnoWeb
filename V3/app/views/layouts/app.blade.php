<!-- app/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="fr" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de la Ferme</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="h-full">
    <!-- Navigation principale -->
    <nav class="bg-indigo-600 shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="/" class="text-white text-xl font-bold">🌾 Gestion Ferme</a>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="/animals" 
                           class="text-white hover:text-gray-200 inline-flex items-center px-1 pt-1">
                            <i class="fas fa-paw mr-2"></i> Animaux
                        </a>
                        <a href="/equipment" 
                           class="text-white hover:text-gray-200 inline-flex items-center px-1 pt-1">
                            <i class="fas fa-tools mr-2"></i> Équipements
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- En-tête de page -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">
                @yield('header')
            </h1>
        </div>
    </header>

    <!-- Contenu principal -->
    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            @yield('content')
        </div>
    </main>

    <!-- Pied de page -->
    <footer class="bg-white shadow mt-8">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <p class="text-center text-gray-500 text-sm">
                © {{ date('Y') }} Gestion Ferme. Tous droits réservés.
            </p>
        </div>
    </footer>
</body>
</html>