@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center">Modifier la tâche</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card bg-secondary text-white p-4">
            <form method="POST" action="{{ route('tasks.update', $task->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Titre :</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $task->title) }}"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Date :</label>
                    <input type="date" name="date" class="form-control" value="{{ old('date', $task->date) }}"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Heure de début :</label>
                    <input type="time" name="start_time" class="form-control"
                        value="{{ old('start_time', $task->start_time) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Heure de fin :</label>
                    <input type="time" name="end_time" class="form-control"
                        value="{{ old('end_time', $task->end_time) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description :</label>
                    <textarea name="description" class="form-control">{{ old('description', $task->description) }}</textarea>
                </div>

                <button type="submit" class="btn btn-success w-100">Mettre à jour</button>
            </form>

            <a href="{{ route('tasks.index') }}" class="btn btn-light mt-3 w-100">Annuler</a>
        </div>
    </div>
@endsection
