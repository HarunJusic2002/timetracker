<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ 'TimeTracker' }}</title>

        <link href="{{ asset('css/style.css') }}" rel="stylesheet" />

    </head>
    <body>
        <!-- Include header -->
        @include('partials.header')  

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </body>
</html>
