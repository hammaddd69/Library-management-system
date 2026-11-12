
<!DOCTYPE html>
<html>
<head>
    <title>Members List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            overflow-x: auto;
        }

        h2 {
            text-align: center;
            color: #243447;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background: #243447;
            color: white;
        }

        a {
            color: #243447;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Registered Members</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <p style="color: green;">
            <?= session()->getFlashdata('success') ?>
        </p>
    <?php endif; ?>

    <p>
        <a href="<?= base_url('members') ?>">Register Another Member</a>
    </p>

    <table>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Status</th>
			<th>Action</th>
        </tr>

        <?php foreach ($members as $member): ?>
            <tr>
                <td><?= esc($member['id']) ?></td>
                <td><?= esc($member['full_name']) ?></td>
                <td><?= esc($member['email']) ?></td>
                <td><?= esc($member['phone']) ?></td>
                <td><?= esc($member['address']) ?></td>
                <td><?= esc($member['status']) ?></td>
	<td>
    <a href="<?= base_url('members/edit/' . $member['id']) ?>">
        Edit
    </a>

    |

    <form action="<?= base_url('members/delete/' . $member['id']) ?>"
          method="post" style="display:inline;"
          onsubmit="return confirm('Are you sure you want to delete this member?')">

        <?= csrf_field() ?>

        <button type="submit">Delete</button>

    </form>
</td>
            </tr>
        <?php endforeach; ?>

    </table>

</div>

</body>
</html>
