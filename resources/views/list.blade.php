<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <title>{{ env('APP_NAME') }}</title>
</head>
<body>
<div class="container">
    <br><br><br>
    @include('new')
    <hr>
    <div class="text-center">
        <a href="{{ route('random') }}" class="btn btn-success " style="margin: auto">Choose a Random Movie</a>
    </div>
    <br>
    @if (Session::has('random'))
        @php
            $random = Session::get('random');
        @endphp
        <div class="alert alert-info text-center alert-dismissible fade show" role="alert">
            {{$random->name}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <hr>
    @include('table-list')
</div>
<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('/js/custom.js') }}"></script>
</body>
</html>
