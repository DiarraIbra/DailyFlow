@extends('layout')

@section('content')
    <div class="text-center">
        <h1>DailyFlow - Gestion des tâches</h1>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulaire de création de tâche -->
    <div class="card bg-secondary p-3">
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Titre :</label>
                <input type="text" name="title" class="form-control">
                @error('title')
                    <div class="btn btn-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Date :</label>
                <input type="date" name="date" class="form-control">
                @error('date')
                    <div class="btn btn-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Heure de début :</label>
                <input type="time" name="start_time" class="form-control">
                @error('start_time')
                    <div class="btn btn-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Heure de fin :</label>
                <input type="time" name="end_time" class="form-control">
                @error('end_time')
                    <div class="btn btn-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Description :</label>
                <textarea name="description" class="form-control"></textarea>
                @error('description')
                    <div class="btn btn-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Créer</button>
        </form>
    </div>

    <!-- Liste des tâches -->
    <div class="mt-4">
        <h3>Liste des tâches</h3>
        @forelse($tasks as $task)
            <div class="card bg-dark text-white p-3 mt-2">
                <h5>{{ $task->title }}</h5>
                <p>{{ $task->description }}</p>
                <p><strong>Date :</strong> {{ $task->date }}</p>
                <p><strong>Horaire :</strong> {{ $task->start_time }} - {{ $task->end_time }}</p>
                <div class="d-flex gap-2">
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Modifier</a>

                    <!-- Bouton Supprimer (ouvre le modal) -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#deleteModal-{{ $task->id }}">
                        Supprimer
                    </button>
                </div>
            </div>

            <!-- Modal de confirmation -->
            <div class="modal fade" id="deleteModal-{{ $task->id }}" tabindex="-1"
                aria-labelledby="deleteModalLabel-{{ $task->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content bg-dark text-white">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel-{{ $task->id }}">Confirmation de suppression
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                        </div>
                        <div class="modal-body">
                            <p>Êtes-vous sûr de vouloir supprimer la tâche <strong>"{{ $task->title }}"</strong> ?</p>
                            <p class="text-warning">Cette action est irréversible.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Oui, Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        @empty
            <p>Aucune tâche disponible.</p>
        @endforelse
    </div>


    <!-- Pagination -->
    <div class="mt-3 d-flex justify-content-center">
        {{ $tasks->links('pagination::bootstrap-5') }}
    </div>
@endsection
