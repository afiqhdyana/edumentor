<!DOCTYPE html>
<html>

<head>
    <title>Signup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        .form-container {
            background: #fff;
            padding: 20px;
            margin: 20px auto;
            width: 300px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input {
            width: 100%;
            height: 30px;
            margin-bottom: 15px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            color: #333;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h1>Signup</h1>
        <form method="POST" action="/register">
            {{ csrf_field() }}
            <input type="text" id="name" name="name" placeholder="First Name" required><br>
            <input type="text" id="email" name="email" placeholder="Email Address" required><br>
            <input type="password" id="password" name="password" placeholder="Password" required><br>
            <input type="submit" value="Sign Up">
        </form>
        <p>Already have an account? <a href="login">Login</a></p>
    </div>
</body>

</html>
