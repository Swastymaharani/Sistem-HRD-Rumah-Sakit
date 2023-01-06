<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    
    @include('templates.metadata')
    <style>
        .currency{
            text-align: right;
        }
    </style>
    <title>Sign Up</title>
</head>
<body>
    <br> <br>
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <main class="form-login">
                <h1 class="h3 mb-3 fw-normal text-center">Sign Up</h1>
                    <form action="{{ route('user-simpan-tamu') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @foreach ($formdata as $key=>$value)
                        @if ($value[0]=='text')
                        <div class="form-floating">
                            <input type="{{ $value[0] }}" class="form-control @error($key) is-invalid @enderror" name="{{ $key }}" id="floatingInput" placeholder="{{ $value[1] }}" value="{{ old($key) }}">
                            <label for="floatingInput">{{ $value[1] }}</label>
                            @error($key)
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        @endif
                    
                        @if ($value[0]=='password')
                        <div class="form-floating">
                            <input type="{{ $value[0] }}" class="form-control @error($key) is-invalid @enderror" name="{{ $key }}" id="floatingInput" placeholder="{{ $value[1] }}">
                            <label for="floatingInput">{{ $value[1] }}</label>
                            @error($key)
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        @endif
                        
                        @endforeach
                        <small class="d-block mt-2">Already Registered? <a href="{{ route("user-login") }}">Log In</a></small>
                        <div class="mt-3 mb-5" id="tombol">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
            </main>
        </div>
    </div>
</body>
</html>
