
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Library Management</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #243447, #456789);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 15px;
        }

        .login-box {
            background: white;
            padding: 35px;
            width: 350px;
            max-width: 100%;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            color: #243447;
            margin-bottom: 10px;
        }

        .subtitle {
            text-align: center;
            color: #777;
            font-size: 14px;
            margin-bottom: 25px;
        }

        input {
            width: 100%;
            padding: 13px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border-color: #456789;
        }

        button {
            width: 100%;
            padding: 13px;
            background-color: #243447;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 12px;
        }

        button:hover {
            background-color: #456789;
        }

        .error {
            color: #d93025;
            text-align: center;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .footer {
            text-align: center;
            color: #999;
            font-size: 12px;
            margin-top: 25px;
        }
    </style>
</head>

<body>

    <div class="login-box">

        <h2>📚 Library Admin Login</h2>

        <p class="subtitle">Welcome back! Please log in to continue.</p>

        <?php if (session()->getFlashdata('error')): ?>
            <p class="error">
                <?= esc(session()->getFlashdata('error')) ?>
            </p>
        <?php endif; ?>

        <form method="post" action="<?= base_url('login/authenticate') ?>">

            <?= csrf_field() ?>

            <input type="text" name="username"
                   placeholder="Enter Username" required>

            <input type="password" name="password"
                   placeholder="Enter Password" required>

            <button type="submit">Login</button>

        </form>

        <div class="footer">
            Library Management System &copy; <?= date('Y') ?>
        </div>

    </div>

</body>
</html>
```
