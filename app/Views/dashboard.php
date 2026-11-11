
<!DOCTYPE html>
<html>
<head>
    <title>Library Management Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            margin: 0;
        }

        .header {
            background: #243447;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .container {
            padding: 30px;
            text-align: center;
        }

        .card {
            background: white;
            padding: 25px;
            margin: 15px auto;
            max-width: 400px;
            border-radius: 8px;
        }

        .logout {
            display: inline-block;
            background: #d9534f;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>Library Management System</h1>
        <p>Admin Dashboard</p>
    </div>

    <div class="container">

        <div class="card">
            <h2>Welcome, <?= esc(session()->get('username')) ?>!</h2>
            <p>You have successfully logged in.</p>
            <a href="<?= base_url('logout') ?>" class="logout">Logout</a>
        </div>

    </div>

</body>
</html>
