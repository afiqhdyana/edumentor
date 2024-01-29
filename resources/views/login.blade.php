<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>EduMentor System - Login</title>

    <link rel="shortcut icon" href="assets/img/favicon.png">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/feather/feather.css">

    <link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <style>
      

        body {
            background-image: url('assets/img/background1.png'); 
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed; /* Optional: Use 'fixed' if you want the background to stay fixed while scrolling */
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        #content {
        background-color: rgba(255, 255, 255, 0.8); /* Adjust the last parameter (0.9) for transparency */
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        padding: 30px;
        border-radius: 10px;
        width: 100%;
        max-width: 400px;
        margin: auto; /* Center the container horizontally */
    }

        .login-right {
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: 500;
        }

        .profile-views {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            color: #9a9a9a;
        }

        .pass-input {
            padding-right: 30px;
        }

        .toggle-password {
            cursor: pointer;
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            color: #9a9a9a;
        }

        .login-right-wrap h1 {
            font-size: 28px; /* Adjust the font size as needed */
        }

        .login-right-wrap h2 {
            font-size: 24px;
            text-align: center; /* Adjust the font size as needed */
        }

        .account-subtitle {
        margin-top: 10px;
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="container">
        <section id="content">
            <div class="login-right">
                <div class="login-right-wrap">
                <a href="" class="logo">
                <img src="assets/img/logo-small.png" alt="Logo" >
                </a>
                <br><br>
                    <h1>Welcome to EduMentor</h1>
                    <p class="account-subtitle">Need an account? <a href="register">Sign Up</a></p>
                    
                    <form method="POST" action="/login">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>Email<span class="login-danger">*</span></label>
                            <input class="form-control" type="text" name="email" required>
                            <span class="profile-views"><i class="fas fa-user-circle"></i></span>
                        </div>

                        <div class="form-group">
                            <label>Password <span class="login-danger">*</span></label>
                            <input class="form-control pass-input" type="password" name="password" required>
                            <span class="profile-views feather-eye toggle-password"></span>
                        </div>
                        <div>
                            <input class="btn btn-primary btn-block" type="submit" value="Log in" />
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>

</html>
