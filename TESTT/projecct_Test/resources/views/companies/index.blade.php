<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TEST CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>TEST LARAVEL CRUD</h2>
                
            </div>
            <div>
                <div class="form-group my-3">
                <a href="{{ route('companies.create')}}" class="btn btn-success">Create company</a>
        </div>
    </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Company Name</th>
            <th>Company Email</th>
            <th>Company Name</th>
            <th>Company Tel</th>
            <th width="250px">Action</th>
        </tr>
        @foreach($companies as $company)
        <tr>
            <td>{{ $company->id }}</td>
            <td>{{ $company->name }}</td>
            <td>{{ $company->email }}</td>
            <td>{{ $company->tel }}</td>
            <td>{{ $company->address }}</td>
            <td>
                <form action="{{ route('companies.destroy', $company->id)}}" method ="POST">
                    <a href="{{ route('companies.edit', $company->id) }}"class="fa-solid fa-pen-to-square">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="fa-solid fa-trash">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $companies -> links('pagination::bootstrap-5') !!}
        </div>
    </div>
</body>
</html>
