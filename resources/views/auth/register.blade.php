<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Custom styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
            color: #333;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4"><i class="fas fa-user-plus"></i> Registration</h1>
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name"><i class="fas fa-user"></i> Name:</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label for="email"><i class="fas fa-envelope"></i> Email:</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email">
            </div>
            <div class="form-group">
                <label for="password"><i class="fas fa-lock"></i> Password:</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-success btn-lg"><i class="fas fa-user-plus"></i> Register</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
