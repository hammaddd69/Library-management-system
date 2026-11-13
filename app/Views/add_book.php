

<!DOCTYPE html>
<html>
<head>
    <title>Add New Book</title>
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
            max-width: 500px;
            background: white;
            margin: 30px auto;
            padding: 25px;
            border-radius: 8px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;
            box-sizing: border-box;
        }

        button {
            background: #243447;
            color: white;
            padding: 12px;
            border: none;
            width: 100%;
            cursor: pointer;
        }

        @media (max-width: 600px) {
            .container {
                margin: 15px;
            }
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>Library Management System</h1>
        <p>Add New Book</p>
    </div>

    <div class="container">

        <h2>Book Details</h2>
		
		<?php if (session()->getFlashdata('success')): ?>
    <p style="color: green;">
        <?= session()->getFlashdata('success') ?>
    </p>
<?php endif; ?>

        <form action="<?= base_url('books/save') ?>" method="post">

            <?= csrf_field() ?>

            <label>Book Title</label>
			<input type="text" name="title" id="title">

            <label>Author</label>
            <input type="text" name="author" id="author">

            <label>ISBN</label>
           <input type="text" name="isbn" id="isbn">
		   <button type="button" id="lookupBook">
    Find Book Details
</button>

<p id="apiMessage"></p>

            <label>Category</label>
            <input type="text" name="category">

            <label>Publisher</label>
            <input type="text" name="publisher" id="publisher">

            <label>Published Year</label>
            <input type="text" name="published_year" id="published_year">

            <label>Quantity</label>
            <input type="number" name="quantity" min="1" value="1" required>

            <button type="submit">Save Book</button>

        </form>

    </div>
	<script>
document.getElementById('lookupBook').addEventListener('click', function() {

    const isbn = document.getElementById('isbn').value.trim();
    const message = document.getElementById('apiMessage');

    if (isbn === '') {
        message.textContent = 'Please enter an ISBN first.';
        return;
    }

    message.textContent = 'Searching for book details...';

    fetch('https://openlibrary.org/isbn/' + encodeURIComponent(isbn) + '.json')
        .then(response => {
            if (!response.ok) {
                throw new Error('Book not found.');
            }
            return response.json();
        })
        .then(book => {
            document.getElementById('title').value = book.title || '';

            document.getElementById('publisher').value =
                book.publishers ? book.publishers[0] : '';

            document.getElementById('published_year').value =
                book.publish_date ? book.publish_date.match(/\d{4}/)?.[0] || '' : '';

            if (book.authors && book.authors.length > 0) {
                return Promise.all(
                    book.authors.map(author =>
                        fetch('https://openlibrary.org' + author.key + '.json')
                            .then(response => response.json())
                            .then(data => data.name)
                    )
                );
            }

            return [];
        })
        .then(authors => {
            document.getElementById('author').value = authors.join(', ');
            message.textContent = 'Book details found successfully!';
        })
        .catch(error => {
            message.textContent = error.message;
        });

});
</script>

</body>
</html>
