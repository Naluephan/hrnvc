
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12">
                <h2>Add Company</h2>
            </div>  
            <div>
            <a href="{{ route('companies.index') }}" class="btn btn-primary ">Back</a>
        </div>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
                </div>
        @endif
        <form action="{{ route ('companies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Company Name</strong>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Company Name">
                    @error('name')
                    <div class="alert alert-danger">{{ $message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group my-3">
                    <strong>Company Email</strong>
                    <input type="Email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Company Email">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group my-3">
                    <strong>Company address</strong>
                    <input type="text" name="address" value="{{ old('address') }}" class="form-control" placeholder="Company address">
                    @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Company tel</strong>
                    <input type="tel" name="tel" value="{{ old('tel') }}" class="form-control" placeholder="Company tel">
                    @error('tel')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
            <button type="submit" class="mt-3 btn btn-primary">success</button>
        </div>
    </form>
        </div>
    </div>
</body>
</html>