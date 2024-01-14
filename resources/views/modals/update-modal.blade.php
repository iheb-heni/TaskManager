<!-- Modal Bootstrap unique -->
<div class="modal" tabindex="-1" id="myModal{{ $task->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier la Tâche</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('Task.Update', ['id' => $task->id]) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="title" class="form-label">Titre de la tâche</label>
                            <input type="text" class="form-control" name="title" value="{{ $task->title }}" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="description" class="form-label">Description de la tâche</label>
                            <input type="text" class="form-control" name="description" value="{{ $task->description }}" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="phone" class="form-label">Numéro de téléphone</label>
                            <input type="tel" class="form-control" name="phone" value="{{ $task->phone }}" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="picture" class="form-label">Image actuelle</label>
                            <img src="{{ asset('images/' . $task->picture) }}" alt="Task Image" style="max-width: 100px; max-height: 100px;">
                            <input type="file" class="form-control mt-2" name="new_picture" accept="image/*">
                        </div>

                        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
