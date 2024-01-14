<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Liste de Tasks</title>
    <script>
        $(document).ready(function () {
        $('form').validate();
        });         
    </script>
    <style>
    </style>
</head>
<body>
    @include('includes.navbar')
    <div class="container text-center">
        <h1>Liste des Tasks</h1>
        <div class="btn-group float-start" role="group" aria-label="Basic example">
            <a class="btn btn-primary" aria-current="page" href="{{ route('Task.add') }}">Ajouter une tache</a>
        </div>
        @if(session('success'))
            <div id="successAlert" class="alert alert-success">
               {{ session('success') }}
            </div>
            <script>
               setTimeout(function(){
               document.getElementById('successAlert').style.display = 'none';
               }, 2000);
            </script>
        @endif
        @if ($tasks->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">titre</th>
                        <th scope="col">description</th>
                        <th scope="col">phone</th>
                        <th scope="col">picture</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->phone }}</td>
                        <td class="py-4 px-6">
                                <img src="{{asset('images/' . $task->picture) }}" alt="Task Image" style="max-width: 100px; max-height: 100px;">
                        </td>                           
                        <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal{{ $task->id }}">Modifier</button>   
                        @include('modals.update-modal')
                        <form action="{{route('Task.Delete', ['id' => $task->id])}}" method="POST" style="display:inline;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cette tâche?')">Supprimer</button>
                        </form>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex">
               {!! $tasks->links() !!}
            </div> 
        @else
            <tr>
                <td>
                    pas de tâches pour le moment!
                </td>
            </tr>
        @endif
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
