<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gravy Shortener</title>
    <link href="{{ asset('/styles/shortened.css') }}" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Nunito+Sans:wght@200;300;400;600;700;800&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/aeb2c88209.js" crossorigin="anonymous"></script>


  </head>
  <body>

    <script>
        function copyToClipboard() {
            navigator.clipboard.writeText('{{ $domain }}{{ $id }}');

            const toast = document.querySelector('.toast');
            toast.classList.add('display');

            setTimeout(() => {
                toast.classList.remove('display');
            }, 3000);
        }
    </script>

    <style>
        .heading {
            font-size: 2em;
            font-weight: bold;
            color: #000;
            text-decoration: none;
            text-align: center;
            color: white;
            font-family: 'Nunito Sans';
            font-size: 3em;
            margin-bottom: 10px;
        }

        .short {
            font-size: 1.5em;
            font-weight: bold;
            color: #000;
            text-decoration: none;
            text-align: center;
            color: white;
            font-family: 'Nunito Sans';
            font-size: 1.5em;
            overflow-wrap: anywhere;
            margin: 0;
        }

        .short:hover {
            cursor: pointer;
            color: #50C878;
            text-decoration: underline;
        }

        .separator {
            color: white;
        }

        .container {
            background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
            background-color: rgb(17 24 39);
            height: calc(100vh - 10px);
            margin: 0;
            padding-top: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .copy-hover {
            color: white;
            text-align: center;
        }

        .copy-hover:hover {
            cursor: pointer;
            color: #50C878;
        }

        body {
            padding: 0;
            margin: 0;
        }

        .toast {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #50C878;
            padding: 20px;
            border-radius: 10px;
            opacity: 0;
            transition: opacity 0.3s ease-out;
            margin-left: 20px;
        }

        .toast.display {
            opacity: 1;
            transition: opacity 0.3s ease-in;
        }

        .toast > p {
            margin: 0;
            font-size: 1.2em;
        }

        .link-container {
            margin: 0px 20px 0 20px;
            align-items: center;
            display: flex;
            flex-direction: row;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
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
            border-radius: 5px;
            transition: background-color 0.3s ease-in;
        }

        .button:hover {
            background-color: #3b9f5f;
        }

        .options-container {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            margin: 10px;
        }

    </style>

    <div class="toast">
        <p>Copied text to clipboard</p>
    </div>
    <div class="container">
        <h1 class="heading">Your URL</h1>
        <div class="link-container">
            <i class="fa-solid fa-copy copy-hover" onclick="copyToClipboard()"></i>
            <p class="separator">|</p>
            <a class="short" href={{ $domain.$id }}>{{ $domain.$id }}</a>
        </div>
        <div class="options-container">
            <a class="button" href="/">Shorten another URL</a>
            <a class="button" href="/stats/{{ $id }}">View stats</a>
        </div>
    </div>
  </body>
</html>
