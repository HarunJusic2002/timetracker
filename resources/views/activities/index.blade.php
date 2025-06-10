@extends('layouts.app')

@section('content')

<section class="activities">
  <div class="container">
   @if (session('success'))
      <div class="alert-message">
          {{ session('success') }}
      </div>
    @endif

    <div class="activities-header">
      <h1 class="title">📚 Spisak aktivnosti</h1>
      <a href="{{ route('activities.create') }}" class="btn add">➕ Dodaj aktivnost</a>
    </div>

    @if($activities->isEmpty())
      <div class="empty-table">
          Trenutno nema unesenih aktivnosti.
      </div>
    @else

    <table>
      <thead>
        <tr>
          <th>Naslov</th>
          <th>Datum</th>
          <th>Trajanje (min)</th>
          <th>Kategorija</th>
          <th>Opis</th>
          <th>Akcije</th>
        </tr>
      </thead>
      <tbody>
        @foreach($activities as $activity)
          <tr>
            <td>{{ $activity->title }}</td>
            <td>{{ $activity->activity_date }}</td>
            <td>{{ $activity->duration }}</td>
            <td>{{ $activity->category->name ?? 'N/A' }}</td>
            <td>{{ \Illuminate\Support\Str::limit($activity->description, 50) }}</td>
            <td class="actions">
              <a href="{{ route('activities.edit', $activity->id) }}" class="btn edit">Uredi</a>
              <form action="{{ route('activities.destroy', $activity->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <input type="submit" value="Izbriši" class="btn delete" onclick="return confirm('Jesi li siguran da želiš izbrisati ovu aktivnost?')">
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    @endif
  </div>
</section>

@endsection