<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Création de Tâches</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            margin-top: 50px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            border-radius: 15px 15px 0 0;
        }
        .card-body {
            padding: 20px;
        }
        .form-label {
            font-weight: bold;
        }
        .form-control {
            border-radius: 5px;
            margin-bottom: 15px;
        }
        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>

<script>
    $(document).ready(function () {
        $('form').validate();
    });
</script>
   
</head>
<body>

    @include('includes.navbar')

    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h1>Ajouter une Tâche</h1>
            </div>
            <div class="card-body">
            
            
                <form action="{{route('Task.Store')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-6">
                            <label for="title" class="form-label">Titre de la tâche</label>
                            <input type="text" class="form-control" name="title" placeholder="Entrer le titre de la tâche" required>
                        </div>
                        <div class="col-md-6">
                            <label for="description" class="form-label">Description de la tâche</label>
                            <input type="text" class="form-control" name="description" placeholder="Entrer la description de la tâche" required>
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Numéro de téléphone</label>
                            <input type="tel" class="form-control" name="phone" placeholder="Entrer le numéro de téléphone" required>
                        </div>
                        <div class="col-md-6">
                            <label for="picture" class="form-label">Image</label>
                            <input type="file" class="form-control" name="picture" accept="image/*" required>
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
                            <button type="submit">Enregistrer</button>
                        </div>
                       

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
