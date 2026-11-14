
<!DOCTYPE html>
<html>
<head>
    <title>Library Management Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        * {
            box-sizing: border-box;
        }

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
            max-width: 1100px;
            margin: auto;
            padding: 25px;
        }

        .welcome {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 25px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 15px;
            margin-bottom: 30px;
        }

        .stat-card {
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            background: white;
        }

        .menu {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }

        .menu a {
            display: block;
            background: white;
            padding: 25px 15px;
            border-radius: 8px;
            text-align: center;
            text-decoration: none;
            color: #243447;
            font-weight: bold;
            border: 1px solid #ddd;
            transition: 0.2s;
        }

        .menu a:hover {
            background: #243447;
            color: white;
        }

        .logout {
            display: inline-block;
            background: #d9534f;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 15px;
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

        <div class="welcome">
            <h2>Welcome, <?= esc(session()->get('username')) ?>!</h2>
            <p>You have successfully logged in.</p>
        </div>

        <h2>Dashboard Statistics</h2>

        <div class="stats">

            <div class="stat-card" style="background:#e3f2fd;">
                <h3>Total Books</h3>
                <h2><?= $totalBooks ?></h2>
            </div>

            <div class="stat-card" style="background:#e8f5e9;">
                <h3>Total Members</h3>
                <h2><?= $totalMembers ?></h2>
            </div>

            <div class="stat-card" style="background:#fff3e0;">
                <h3>Borrowed Books</h3>
                <h2><?= $borrowedBooks ?></h2>
            </div>

            <div class="stat-card" style="background:#f3e5f5;">
                <h3>Returned Books</h3>
                <h2><?= $returnedBooks ?></h2>
            </div>

        </div>

        <h2>Library Management</h2>

        <div class="menu">

            <a href="<?= base_url('books') ?>">
                📚 Add New Book
            </a>

            <a href="<?= base_url('books/list') ?>">
                📖 View All Books
            </a>

            <a href="<?= base_url('members') ?>">
                👤 Add New Member
            </a>

            <a href="<?= base_url('members/list') ?>">
                👥 View All Members
            </a>

            <a href="<?= base_url('borrow') ?>">
                📕 Borrow a Book
            </a>

            <a href="<?= base_url('borrow/list') ?>">
                📋 Borrowing Records
            </a>

        </div>

        <a href="<?= base_url('logout') ?>" class="logout">
            Logout
        </a>

    </div>

</body>
</html>

