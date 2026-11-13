<!DOCTYPE html>
<html>
<head>
    <title>Borrowing Records</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #eee;
        }

        @media (max-width: 700px) {
            table {
                font-size: 12px;
            }

            th, td {
                padding: 5px;
            }
        }
    </style>
</head>
<body>

    <h2>Borrowing Records</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Member</th>
            <th>Book</th>
            <th>Borrow Date</th>
            <th>Due Date</th>
            <th>Return Date</th>
            <th>Status</th>
			<th>Action</th>
        </tr>

        <?php foreach ($records as $record): ?>
            <tr>
                <td><?= esc($record['id']) ?></td>
                <td><?= esc($record['full_name']) ?></td>
                <td><?= esc($record['title']) ?></td>
                <td><?= esc($record['borrow_date']) ?></td>
                <td><?= esc($record['due_date']) ?></td>
                <td><?= esc($record['return_date'] ?? '-') ?></td>
                <td><?= esc($record['status']) ?></td>
				<td>
    <?php if ($record['status'] === 'borrowed'): ?>
        <form action="<?= base_url('borrow/return/' . $record['id']) ?>" method="post">
            <?= csrf_field() ?>
            <button type="submit"
                onclick="return confirm('Are you sure you want to return this book?')">
                Return Book
            </button>
        </form>
    <?php else: ?>
        Returned
    <?php endif; ?>
</td>
            </tr>
        <?php endforeach; ?>

    </table>

</body>
</html>