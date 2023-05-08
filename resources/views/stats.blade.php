<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gravy Shortener</title>
    {{-- <link href="{{ asset('/styles/stats.css') }}" rel="stylesheet" /> --}}
    @vite(['resources/css/app.css'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Nunito+Sans:wght@200;300;400;600;700;800&display=swap" rel="stylesheet">
  </head>

  <style>
    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
        width: 100vw;
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
        background-color: rgb(17 24 39);
    }
        .heading {
        color: white;
        font-family: 'Nunito Sans';
        font-weight: bold;
        margin: 0;
        font-size: 3em;
        text-align: center;
    }

    .heading-url {
        font-weight: bold;
        color: #000;
        text-decoration: none;
        text-align: center;
        color: rgb(177, 177, 177);
        font-family: 'Nunito Sans';
        font-size: 1.3em;
        overflow-wrap: anywhere;
        margin: 0;
        transition: all 0.2s ease-in-out;
    }

    .heading-url:hover {
        cursor: pointer;
        color: #50C878;
        text-decoration: underline;
    }

    .clicks {
        display: inline;
        color: white;
        font-weight: bold;
        font-family: 'Nunito Sans';
        margin-top: 20px;
    }

    .button {
        background-color: #50C878;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        transition: all 0.2s ease-in-out;
        font-family: 'Nunito Sans';
        font-weight: bold;
        border-radius: 10px;
    }
  </style>

  <body>
    <div class="container">
      <h1 class="heading">Stats for</h1>
      <a class="heading-url" href="{{ env("APP_URL") . ":" . env("APP_PORT") . "/" . $short }}">{{ $short }}</a>
      <h2 class="clicks">Clicks: {{ $visits }}</h2>
      <a class="button" href="/">Shorten another URL</a>
    </div>
  </body>
</html>
