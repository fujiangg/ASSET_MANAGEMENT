<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('assets/css/test.css') }}">

  <title>Button Logout</title>
</head>
<body>
    <style>
        .logout-button {
          background-color: #d9534f;
          color: #fff;
          padding: 8px 16px;
          border-radius: 5px;
          text-decoration: none;
        }
      
        .logout-button:hover {
          background-color: #c9302c;
        }
      </style>
      <a class="nav-link logout-button" href="http://127.0.0.1:8000/landingpage">
        <i class="fas fa-sign-out-alt"></i> Logout
      </a>
</body>
</html>
