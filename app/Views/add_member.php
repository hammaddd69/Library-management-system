
<!DOCTYPE html>
<html>
<head>
    <title>Register Member</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            color: #243447;
        }

        label {
            display: block;
            margin-top: 12px;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            background: #243447;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Register New Member</h2>

    <form action="<?= base_url('members/save') ?>" method="post">

        <?= csrf_field() ?>

        <label>Full Name</label>
        <input type="text" name="full_name" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Phone</label>
        <input type="text" name="phone">

        <label>Address</label>
        <textarea name="address" rows="4"></textarea>

        <button type="submit">Register Member</button>

    </form>

</div>

</body>
</html>
