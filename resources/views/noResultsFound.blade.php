<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No Results Found</title>

    <style>
        @import url(https://fonts.googleapis.com/css?family=Sniglet|Raleway:900);
        
        @import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);
        @import url(https://fonts.googleapis.com/css?family=Open+Sans);
        @import url(https://fonts.googleapis.com/css?family=Bree+Serif);

        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f8f9fa;
            color: #495057;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            text-align: center;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #d6e9c6;
            border-radius: 4px;
            color: #3c763d;
            background-color: #dff0d8;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="alert">
            {{ $message }}
        </div>
        <p>Please check your criteria and try again.</p>
        <a href="{{ url('/home') }}">Go back to Home</a>
    </div>
</body>

</html>
