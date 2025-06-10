@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dobrodošli, {{ Auth::user()->name }}!</h1>

    <p>Uspješno ste se prijavili.</p>

    <a href="{{ route('activities.index') }}" class="btn btn-success">Pogledaj aktivnosti</a>
</div>
@endsection
