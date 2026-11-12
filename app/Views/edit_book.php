
<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
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

        input {
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

    <h2>Edit Book Details</h2>

    <form action="<?= base_url('books/update/' . $book['id']) ?>" method="post">

        <?= csrf_field() ?>

        <label>Book Title</label>
        <input type="text" name="title"
               value="<?= esc($book['title']) ?>" required>

        <label>Author</label>
        <input type="text" name="author"
               value="<?= esc($book['author']) ?>" required>

        <label>ISBN</label>
        <input type="text" name="isbn"
               value="<?= esc($book['isbn']) ?>">

        <label>Category</label>
        <input type="text" name="category"
               value="<?= esc($book['category']) ?>">

        <label>Publisher</label>
        <input type="text" name="publisher"
               value="<?= esc($book['publisher']) ?>">

        <label>Published Year</label>
        <input type="number" name="published_year"
               value="<?= esc($book['published_year']) ?>">

        <label>Quantity</label>
        <input type="number" name="quantity"
               value="<?= esc($book['quantity']) ?>" min="0" required>

        <button type="submit">Update Book</button>

    </form>

</div>

</body>
</html>
