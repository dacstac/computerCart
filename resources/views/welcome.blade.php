<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ComputerCart</title>

    <!-- Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
</head>

<body class="antialiased">
    <nav>
        <nav class="navbar">
            <div class="container-fluid">
                <div class="row w-100">
                    <div class="col-2">
                        <h1>ComputerCart</h1>
                    </div>
                    <div class="col-2 pt-3">
                        @if (auth()->user())
                            Welcome {{ auth()->user()->username }}
                        @else
                            You are not logged
                        @endif
                    </div>
                    <div class="col-2 pt-2">
                        <button type="button" class="btn"><a class="link" href="{{ route('startLogin') }}"><i
                                    class="bi bi-person-circle"></i> My
                                Count</a></button>
                    </div>
                </div>
            </div>
        </nav>
        <hr>
    </nav>
</body>

</html>
