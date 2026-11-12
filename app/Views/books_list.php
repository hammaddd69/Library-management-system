
<!DOCTYPE html>
<html>
<head>
    <title>All Books</title>
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
            padding: 20px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #243447;
            color: white;
        }

        tr:nth-child(even) {
            background: #f2f2f2;
        }

        a {
            color: #243447;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>Library Management System</h1>
        <p>All Books</p>
    </div>

    <div class="container">

        <h2>Book List</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>ISBN</th>
                <th>Category</th>
                <th>Publisher</th>
                <th>Year</th>
                <th>Quantity</th>
                <th>Available</th>
            </tr>

            <?php foreach ($books as $book): ?>
            <tr>
                <td><?= esc($book['id']) ?></td>
                <td><?= esc($book['title']) ?></td>
                <td><?= esc($book['author']) ?></td>
                <td><?= esc($book['isbn']) ?></td>
                <td><?= esc($book['category']) ?></td>
                <td><?= esc($book['publisher']) ?></td>
                <td><?= esc($book['published_year']) ?></td>
                <td><?= esc($book['quantity']) ?></td>
                <td><?= esc($book['available']) ?></td>
				
				// adding the edit book option for each book	
				<td>
				
    <td>
	
<td>

    <a href="<?= base_url('books/edit/' . $book['id']) ?>">Edit</a>

    

    <form action="<?= base_url('books/delete/' . $book['id']) ?>"
          method="post" style="display:inline;"
          onsubmit="return confirm('Are you sure you want to delete this book?')">

        <?= csrf_field() ?>

        <button type="submit">Delete</button>

    </form>
	      
</td>
</td>
</td>
            </tr>
            <?php endforeach; ?>

        </table>

        <p>
            <a href="<?= base_url('books') ?>">Add Another Book</a>
        </p>

    </div>

</body>
</html>
