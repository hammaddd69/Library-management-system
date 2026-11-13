
<!DOCTYPE html>
<html>
<head>
    <title>Borrow a Book</title>
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
            margin-top: 15px;
        }

        select, input {
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

    <h2>Borrow a Book</h2>
	
	<?php if (session()->getFlashdata('success')): ?>
    <p style="color: green;">
        <?= esc(session()->getFlashdata('success')) ?>
    </p>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <p style="color: red;">
        <?= esc(session()->getFlashdata('error')) ?>
    </p>
<?php endif; ?>

    <form action="<?= base_url('borrow/save') ?>" method="post">

        <?= csrf_field() ?>

        <label>Select Member</label>
        <select name="member_id" required>
            <option value="">Choose a member</option>

            <?php foreach ($members as $member): ?>
                <option value="<?= esc($member['id']) ?>">
                    <?= esc($member['full_name']) ?>
                </option>
            <?php endforeach; ?>

        </select>

        <label>Select Book</label>
        <select name="book_id" required>
            <option value="">Choose a book</option>

            <?php foreach ($books as $book): ?>
                <option value="<?= esc($book['id']) ?>">
                    <?= esc($book['title']) ?>
                    (Available: <?= esc($book['available']) ?>)
                </option>
            <?php endforeach; ?>

        </select>

        <label>Borrow Date</label>
        <input type="date" name="borrow_date" required>

        <label>Due Date</label>
        <input type="date" name="due_date" required>

        <button type="submit">Borrow Book</button>

    </form>

</div>

</body>
</html>
