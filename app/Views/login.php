
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Library Management</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f4f7;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .login-box {
            background: white;
            padding: 30px;
            width: 320px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #2457a7;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #183d78;
        }
    </style>
</head>

<body>

    <div class="login-box">

        <h2>Library Admin Login</h2>
		
		<?php if (session()->getFlashdata('error')): ?>
    <p style="color: red; text-align: center;">
        <?= session()->getFlashdata('error') ?>
    </p>
<?php endif; ?>

        <<form method="post" action="<?= base_url('login/authenticate') ?>">

            <input type="text" name="username"
                   placeholder="Enter Username" required>

            <input type="password" name="password"
                   placeholder="Enter Password" required>

            <button type="submit">Login</button>

        </form>

    </div>

</body>
</html>
