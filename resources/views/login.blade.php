<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<style>
    * {
        box-sizing: border-box;
    }

    body {
        background: conic-gradient(from 90deg at 50% 0%, #111827, 50%, #3d3d3d, #111827);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100dvh;
    }

    form {
        min-height: 200px;
        min-width: 300px;
    }

    h1 {
        color: #fff;
        font-size: 3em;
        font-weight: 700;
        margin: 10px 0;
        text-align: center;
    }

    input {
        display: block;
        height: 56px;

        flex-grow: 1;
        padding: 10px 20px;
        border-radius: 15px;
        font-size: 1.5em;
        max-width: 100%;
        border: none;
        width: 100%;

        margin: 20px auto 20px auto;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        padding: 10px 20px 10px 20px;
        border-radius: 15px;
        font-size: 1.5em;
        font-weight: bold;
        height: 56px;
        cursor: pointer;
        border: none;
    }

    input[type="submit"]:hover {
        background-color: #429945;
    }

    .email {
        margin-bottom: 0;
    }

    .have-account {
        color: #fff;
        text-align: center;
        margin-top: 20px;
        font-size: 1.2em;
    }

    .have-account a {
        color: #3eb1fd;
        text-decoration: none;
    }

    .have-account a:hover {
        text-decoration: underline;
    }

    .error-message {
        color: #ff6f6f;
        font-size: 1.1em;
        margin-top: 10px;
        margin-left: 10px;
        max-width: 80%;
    }
</style>

<body>
    <form method="post" action="/login" class="form">
        @csrf
        <h1>Login</h1>
        <input type="text" name="email" class="email" placeholder="Email" />
        @error('email')
            <p class="error-message">{{ $message }}</p>
        @enderror
        <input type="password" name="password" placeholder="Password" />
        <input type="submit" value="Login" />
        <p class="have-account"> Don't have an account yet?
            <a href="/register">Sign up</a>
        </p>
    </form>
</body>
</html>
