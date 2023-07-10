<!doctype html>
<html lang="en">

<head>
    <meta property="og:image" itemprop="image" content="images/logoTitle/logo.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:wight" content="200">
    <meta property="og:image:height" content="200">
    <!-- yield for print section -->
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="images/logoTitle/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    @yield('login')

    @yield('registrasi')

    @yield('konten')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
