<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Título Padrão')</title>

    <!-- Incluir o CSS padrão do Laravel (se necessário) -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!-- Adicionar o CSS do Livewire -->

    <tallstackui:script />
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Adicionar outros CSS ou fontes -->
    @stack('styles')
</head>
<body>

    

        <!-- Conteúdo principal -->
        <div class="container mt-4">
            @livewire("index")
        </div>



    <!-- Scripts JavaScript -->
    <script src="{{ mix('js/app.js') }}"></script>

    <!-- Incluir os Scripts do Livewire -->
    @livewireScripts

    <!-- Adicionar outros scripts, caso necessário -->
    @stack('scripts')

</body>
</html>
