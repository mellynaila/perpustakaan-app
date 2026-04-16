<!DOCTYPE html>
<html>

<head>
    <title>Login</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial;
            background: url("{{ asset('images/bgperpus.jpeg') }}") no-repeat center center/cover;
            height: 100vh;
        }

        /* overlay full layar */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);

            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(12px);
            padding: 30px;
            width: 320px;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.3);
            color: white;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 8px;
            outline: none;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #be8539;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        button:hover {
            background: #be8539;
        }

        .error {
            color: #ffb3b3;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <div class="overlay">

        <div class="login-box">

            <h2>Login</h2>

            @if(session('error'))
            <p class="error">{{ session('error') }}</p>
            @endif

            <form method="POST" action="/login">
                @csrf

                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">

                <button type="submit">Login</button>
            </form>

        </div>

    </div>

</body>

</html>