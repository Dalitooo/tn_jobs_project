<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f4f6;
        }
        .btn-dashboard {
    display: inline-block;
    padding: 10px 20px;
    margin-left: 40px;
    border: none;
    border-radius: 5px;
    background-color: #bbb319;
    color: #ffffff;
    text-decoration: none;
    font-size: 16px;
    transition: background-color 0.3s;
}

        .btn-dashboard:hover {
    background-color: #2d3748;
        }

        .header {
            background-color: #4a5568;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-section {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9fafb;
        }

        h2 {
            margin-top: 0;
            color: #4a5568;
        }

        .form-section h3 {
            margin-top: 0;
            color: #4a5568;
        }

        .form-section form {
            display: flex;
            flex-direction: column;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        button[type="submit"] {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button[type="submit"] {
            background-color: #4a5568;
            color: #fff;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #2d3748;
        }
    </style>
</head>
<body>
    <div class="header">
        @auth
        @if (auth()->user()->role === 'recruteur')
            <a class="btn btn-dashboard" href="{{ route('recruteur.dashboard') }}">Back To Dashboard</a>
        @elseif(auth()->user()->role === 'candidat')
            <a class="btn btn-dashboard" href="{{ route('candidat.dashboard') }}">Back To Dashboard</a>
        @endif
    @endauth    </div>

    <div class="container">
        <div class="form-section">
            <h3>Update Profile Information</h3>
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="form-section">
            <h3>Update Password</h3>
            @include('profile.partials.update-password-form')
        </div>

        <div class="form-section">
            <h3>Delete User</h3>
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</body>
</html>
