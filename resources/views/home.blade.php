@extends('layouts.app')

@section('content')
<section class="hero">
    <div class="container">
        <h1>🕛 TimeTrack apliklacija</h1>
        <p>Upravljajte vašim vremenom, organizujte ga na što bolji naćin i pratite vaše aktivnosti!</p>

        <a href="{{ route('activities.index') }}" class="btn btn-primary">Pogledaj aktivnosti</a>
    </div>
</section>
@endsection