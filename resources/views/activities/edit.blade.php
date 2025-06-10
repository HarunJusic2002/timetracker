@extends('layouts.app')

@section('content')
<div class="form-container">
    <h1 class="title">Uredi Aktivnost</h1>

    @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('activities.update', $activity->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Naslov aktivnosti:</label>
            <input type="text" name="title" id="title" value="{{ old('title', $activity->title) }}" required>
        </div>

        <div class="form-group">
            <label for="activity_date">Datum aktivnosti:</label>
            <input type="date" name="activity_date" id="activity_date" value="{{ old('activity_date', $activity->activity_date) }}" required>
        </div>

        <div class="form-group">
            <label for="duration">Trajanje (u minutama):</label>
            <input type="number" name="duration" id="duration" value="{{ old('duration', $activity->duration) }}" required>
        </div>

        <div class="form-group">
            <label for="category_id">Kategorija:</label>
            <select name="category_id" id="category_id" required>
                <option value="">-- Odaberi kategoriju --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $activity->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="description">Opis:</label>
            <textarea name="description" id="description">{{ old('description', $activity->description) }}</textarea>
        </div>

        <div class="form-btn">
            <button type="submit" class="btn add">Spremi</button>
            <a href="{{ route('activities.index') }}" class="btn back">Otkaži</a>
        </div>
    </form>
</div>
@endsection
