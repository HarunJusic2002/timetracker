@extends('layouts.app')

@section('content')
<div class="form-container">
  <h1 class="title">Dodaj novu aktivnost</h1>

  @if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('activities.store') }}" method="POST">
    @csrf

    <div class="form-group">
      <label for="title">Naslov aktivnosti</label>
      <input type="text" name="title" value="{{ old('title') }}" placeholder="Npr. Trčanje u parku" required>
    </div>

    <div class="form-group">
      <label for="activity_date">Datum aktivnosti</label>
      <input type="date" name="activity_date" value="{{ old('activity_date') }}" required>
    </div>

    <div class="form-group">
      <label for="duration">Trajanje (u minutama)</label>
      <input type="number" name="duration" value="{{ old('duration') }}" placeholder="Npr. 45" required>
    </div>

    <div class="form-group">
      <label for="category_id">Kategorija</label>
      <select name="category_id" required>
        <option value="">-- Odaberi kategoriju --</option>
        @foreach($categories as $category)
          <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="description">Opis (opcionalno)</label>
      <textarea name="description" placeholder="Kratak opis aktivnosti...">{{ old('description') }}</textarea>
    </div>

    <div class="form-btn">
      <button type="submit" class="btn add">Spremi</button>
      <a href="{{ route('activities.index') }}" class="btn back">Otkaži</a>
    </div>
  </form>
</div>
@endsection