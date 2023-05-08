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
        margin: 0;
    }

    /* form {
        min-height: 200px;
        min-width: 300px;
    } */

    h1 {
        color: #fff;
        font-size: 3em;
        font-weight: 700;
        margin: 10px 0;
        text-align: center;
    }

    input, button {
        display: block;
        height: 56px;

        flex-grow: 1;
        padding: 10px 20px;
        border-radius: 15px;
        font-size: 1.5em;
        max-width: 100%;
        border: none;
        width: 100%;

        margin: 20px auto 0 auto;
    }

    button {
        background-color: #4CAF50;
        font-weight: bold;
        cursor: pointer;
        border: none;
        padding: 0;
    }

    button:hover {
        background-color: #429945;
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

    .error {
        color: #ff6f6f;

        font-size: 1.1em;

        margin-top: 10px;
        margin-left: 10px;

        max-width: 80%;
    }

    @media (max-width: 370px) {
        input, button, p {
            font-size: 7vw;
            width: 90vw;
            min-width: 0;
            padding-left: 5vw;
            border-radius: 4vw;
        }

        .have-account {
            font-size: 5vw;
        }

        h1 {
            font-size: 13vw;
        }

        input, button {
            height: 15vw;
            margin-top: 5vw;
        }
    }
</style>

<body>
    <form method="POST" action="/register">
        @csrf
        <h1>Register</h1>
        <input
            type="email"
            name="email"
            value="{{ old('email') }}"
            placeholder="Email"
            required
        />
        @error('email')
            <p class='error'>{{ $message }}</p>
        @enderror

        <input
            type="first_name"
            name="first_name"
            value="{{ old('first_name') }}"
            placeholder="First Name"
            validate="first_name"
            required
        />
        @error('first_name')
            <p class='error'>{{ $message }}</p>
        @enderror

        <input
            type="last_name"
            name="last_name"
            value="{{ old('last_name') }}"
            placeholder="Last Name"
            required
        />
        @error('last_name')
            <p class='error'>{{ $message }}</p>
        @enderror

        <input
            type="password"
            name="password"
            placeholder="Password"
            required
        />

        <input
            type="password"
            name="password_confirmation"
            placeholder="Confirm Password"
            required
        />
        @error('password')
            <p class='error'>{{ $message }}</p>
        @enderror

        <button type="submit">Register</button>
        <p class="have-account"> Already have an account?
            <a href="/login">Sign in</a>
        </p>
    </form>
</body>
</html>
