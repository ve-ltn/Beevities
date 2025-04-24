<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            height: 100vh;
        }

        .container {
            display: flex;
            width: 100%;
        }

        .left-side {
            flex: 1;
            background-size: cover;
        }

        .right-side {
            flex: 0.5;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 50px;
            padding: 20px;
            box-shadow: -5px 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            border-radius: 8.11px;
        }

        h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #555;
        }

        input {
            width: 100%;
            padding: 11px;
            margin-bottom: 14px;
            border: 0.9px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: red;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-side"></div>

        <div class="right-side">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h2>Register</h2>

                <div>
                    <label for="name">Nama:</label>
                    <input type="text" name="name" placeholder="Nama" required>
                    @error('name')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder="Email" required>
                    @error('email')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password">Password:</label>
                    <input type="password" name="password" placeholder="Password" required>
                    @error('password')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation">Konfirmasi Password:</label>
                    <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
                </div>

                <div>
                    <label for="number">Nomor HP:</label>
                    <input type="text" name="number" placeholder="Nomor HP" required>
                    @error('number')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <input type="hidden" name="role" value="0">
                <button type="submit">Register</button>
                <a href="{{ route('login') }}">Back</a>
            </form>
        </div>
    </div>
</body>
</html>
