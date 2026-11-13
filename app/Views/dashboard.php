
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
			<div style="display: flex; flex-wrap: wrap; gap: 20px; margin-top: 25px;">

    <div style="background: #e3f2fd; padding: 20px; border-radius: 8px; min-width: 150px;">
        <h3>Total Books</h3>
        <h2><?= $totalBooks ?></h2>
    </div>

    <div style="background: #e8f5e9; padding: 20px; border-radius: 8px; min-width: 150px;">
        <h3>Total Members</h3>
        <h2><?= $totalMembers ?></h2>
    </div>

    <div style="background: #fff3e0; padding: 20px; border-radius: 8px; min-width: 150px;">
        <h3>Borrowed Books</h3>
        <h2><?= $borrowedBooks ?></h2>
    </div>

    <div style="background: #f3e5f5; padding: 20px; border-radius: 8px; min-width: 150px;">
        <h3>Returned Books</h3>
        <h2><?= $returnedBooks ?></h2>
    </div>

</div>
            <p>You have successfully logged in.</p>
            <a href="<?= base_url('logout') ?>" class="logout">Logout</a>
        </div>

    </div>

</body>
</html>
