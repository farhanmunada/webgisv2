<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title>WebGIS Kopi Temanggung</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    
    <!-- Scripts & Styles (Managed by Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/map.css', 'resources/js/map.js'])
</head>
<body class="antialiased bg-white text-black">

    <!-- MAP CONTAINER -->
    <div id="map"></div>

    <!-- UI COMPONENTS (Partials) -->
    @include('partials.toast')
    @include('partials.map.search-header')
    @include('partials.map.sidebar')
    @include('partials.map.fabs')
    @include('partials.map.route-panel')
    @include('partials.map.bottom-sheet')

    <!-- MAP CONFIGURATION -->
    <script>
        window.MAP_CONFIG = {
            geojsonUrl: '{{ asset("geojson/temanggungPride.json") }}'
        };
        window.AUTH_CONFIG = {
            isAuthenticated: @json(auth()->check()),
            role: @json(auth()->user()?->role),
            umkmStatus: @json(auth()->check() ? \App\Models\Umkm::where('user_id', auth()->id())->first()?->status : null)
        };
    </script>

    <!-- Google Maps API (Initialization handled in map.js) -->
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=visualization"></script>
</body>
</html>
