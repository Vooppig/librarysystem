<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Image Upload in laravel 9</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row pt-5">
            <div class="col-md-12">
                <h1 class="text-info mb-3 text-center">How to upload image in laravel 9</h1>
                <div class="card">
                    <div class="card-header">Uploaded Images List</div>
                    <div class="card-body">
                        <a href="{{ url('/form') }}" class="btn btn-info">Upload New Image</a>
                        <table class="table">
                            <thead>
                                <th>ID</th>
                                <th>Image</th>
                            </thead>
                            <tbody>
                                @foreach ($image as $show)
                                <tr>
                                    <td>{{ $show->id }}</td>
                                    <td><img src="{{ asset('storage/images/'.$show->image) }}" alt="" width="200px" height="200px"></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>