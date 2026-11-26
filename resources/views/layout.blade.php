<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'ENEAM - Gestion des PV')</title>

    {{-- SCRIPTS & STYLES VITE (Tailwind) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- CSS DU LAYOUT --}}
    @include('include.css')

    {{-- CSS SPECIFIQUE AUX PAGES --}}
    @stack('styles')
</head>

<body>

    {{-- ICONES SVG (sprite) --}}
    @include('include.icons')

    <div class="app" id="app">

        {{-- SIDEBAR --}}
        @include('include.sidebar')
        <div class="scrim" id="scrim"></div>

        <div class="main">

            {{-- NAVBAR --}}
            @include('include.navbar')

            {{-- CONTENU PRINCIPAL --}}
            <main class="content">
                @yield('content')
            </main>

            {{-- FOOTER --}}
            <footer>
                <span>ENEAM - Gestion des procès-verbaux</span>
                <span>Copyright © {{ date('Y') }}. Tous droits réservés.</span>
            </footer>

        </div>
    </div>

    {{-- JAVASCRIPT DU LAYOUT --}}
    @include('include.script')

    @stack('scripts')

</body>
</html>