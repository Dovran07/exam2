<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">
    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
</head>
<body class="bg-light">
@extends('app.nav')
<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="img/3.jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-3 text-danger">Gorogly Fitness</h1>
            <p class="lead">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorem ab reprehenderit consectetur veritatis perferendis dolor quisquam perspiciatis libero vitae? Rem ex qui facilis cupiditate sed?</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <button type="button" class="btn btn-danger btn-lg px-4 me-md-2 bg-danger">Customers</button>
                <button type="button" class="btn btn-outline-secondary bg-secondary text-white btn-lg px-4">Pricing</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>