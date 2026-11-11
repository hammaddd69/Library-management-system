<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = 'books';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'title',
        'author',
        'isbn',
        'category',
        'publisher',
        'published_year',
        'quantity',
        'available'
    ];
}
