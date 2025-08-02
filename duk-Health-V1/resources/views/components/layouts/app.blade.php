<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="relative min-h-screen bg-white dark:bg-zinc-800">
    {{-- Header --}}
    @include('components.layouts.app.header')

    {{-- Sidebar --}}
    @include('components.layouts.app.sidebar')

    {{-- Contenido principal --}}
    <flux:main>
        @isset($header)
            <div>
                {{ $header }}
            </div>
        @endisset

        @isset($content)
            <div>
                {{ $content }}
            </div>
        @else
            <div>
                {{ $slot }}
            </div>
        @endisset
    </flux:main>

    @fluxScripts

    {{-- Mensajes de Confirmaciones --}}
    @if (session()->has('success'))
        <script>
            Swal.fire({
                position: "center",
                icon: "success",
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @elseif (session()->has('warning'))
        <script>
            Swal.fire({
                position: "center",
                icon: "warning",
                title: "{{ session('warning') }}",
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @elseif (session()->has('danger'))
        <script>
            Swal.fire({
                position: "center",
                icon: "error",
                title: "{{ session('danger') }}",
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif
</body>

</html>
