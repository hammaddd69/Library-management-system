

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

        #searchInput {
            padding: 10px;
            width: 280px;
            max-width: 90%;
            margin-bottom: 20px;
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

        button {
            cursor: pointer;
            padding: 6px 10px;
        }

        @media (max-width: 700px) {
            th, td {
                padding: 7px;
                font-size: 12px;
            }
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

        <div>
            <input
                type="text"
                id="searchInput"
                placeholder="Search books..."
                value="<?= esc($keyword ?? '') ?>"
            >
        </div>

        <table id="booksTable">

            <thead>
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
                    <th>Action</th>
                </tr>
            </thead>

            <tbody id="booksTableBody">

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

                    <td>
                        <a href="<?= base_url('books/edit/' . $book['id']) ?>">
                            Edit
                        </a>

                        <form action="<?= base_url('books/delete/' . $book['id']) ?>"
                              method="post"
                              style="display:inline;"
                              onsubmit="return confirm('Are you sure you want to delete this book?')">

                            <?= csrf_field() ?>

                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>

            </tbody>

        </table>

        <p>
            <a href="<?= base_url('books') ?>">Add Another Book</a>
        </p>

    </div>

    <script>

    const searchInput = document.getElementById('searchInput');
    const tableBody = document.getElementById('booksTableBody');

    searchInput.addEventListener('input', function() {

        const keyword = this.value;

        fetch('<?= base_url('books/search-ajax') ?>?keyword=' + encodeURIComponent(keyword))
            .then(response => {
                if (!response.ok) {
                    throw new Error('Search request failed.');
                }
                return response.json();
            })
            .then(books => {

                tableBody.innerHTML = '';

                if (books.length === 0) {
                    tableBody.innerHTML =
                        '<tr><td colspan="10">No books found.</td></tr>';
                    return;
                }

                books.forEach(book => {

                    const row = document.createElement('tr');

                    const values = [
                        book.id,
                        book.title,
                        book.author,
                        book.isbn || '',
                        book.category || '',
                        book.publisher || '',
                        book.published_year || '',
                        book.quantity,
                        book.available
                    ];

                    values.forEach(value => {
                        const cell = document.createElement('td');
                        cell.textContent = value ?? '';
                        row.appendChild(cell);
                    });

                    const actionCell = document.createElement('td');

                    const editLink = document.createElement('a');
                    editLink.href =
                        '<?= base_url('books/edit/') ?>' + book.id;
                    editLink.textContent = 'Edit';

                    actionCell.appendChild(editLink);
                    actionCell.appendChild(document.createTextNode(' '));

                    const deleteForm = document.createElement('form');
                    deleteForm.action =
                        '<?= base_url('books/delete/') ?>' + book.id;
                    deleteForm.method = 'post';
                    deleteForm.style.display = 'inline';

                    deleteForm.onsubmit = function() {
                        return confirm('Are you sure you want to delete this book?');
                    };

                    const csrfInput = document.createElement('input');
                    csrfInput.type = 'hidden';
                    csrfInput.name = '<?= csrf_token() ?>';
                    csrfInput.value = '<?= csrf_hash() ?>';

                    const deleteButton = document.createElement('button');
                    deleteButton.type = 'submit';
                    deleteButton.textContent = 'Delete';

                    deleteForm.appendChild(csrfInput);
                    deleteForm.appendChild(deleteButton);

                    actionCell.appendChild(deleteForm);
                    row.appendChild(actionCell);

                    tableBody.appendChild(row);

                });

            })
            .catch(error => {
                console.error('Search error:', error);
            });

    });

    </script>

</body>
</html>
