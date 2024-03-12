<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500</title>
    <link rel="stylesheet" href="{{ asset('/assets/compiled/css/app.css') }} ">
    <link rel="stylesheet" href="{{ asset('/assets/compiled/css/error.css') }} ">
</head>

<body>
    <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>
    <div id="error">
        <div class="error-page container">
            <div class="col-md-8 col-12 offset-md-2">
                <div class="text-center">
                    <img class="img-error" src="./assets/compiled/svg/error-500.svg" alt="Not Found">
                    <h1 class="error-title">System Error</h1>
                    <p class="fs-5 text-gray-600">The website is currently unaivailable. Try again later or contact the
                        developer.</p>
                    <a href="index.html" class="btn btn-lg btn-outline-primary mt-3">Go Home</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
