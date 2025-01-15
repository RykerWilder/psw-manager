<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- CDN Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Welcome</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h1>Hi {{ $name }},</h1>
                <h3>welcome on iLock!</h3>

                

                <h5 class="text-center">Click on the following button to enter in your dahsboard.</h5>
                <div class="d-flex justify-content-center mb-5">
                    <a href="" class="btn btn-success">Login</a>
                </div>

                <hr>

                <div class="d-flex justify-content-center">
                    <h5>&#169; 2025 | iLock | All rights are reserved</h5>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
