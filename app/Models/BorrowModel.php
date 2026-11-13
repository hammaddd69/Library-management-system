<?php

namespace App\Models;

use CodeIgniter\Model;

class BorrowModel extends Model
{
    protected $table = 'borrow_records';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'member_id',
        'book_id',
        'borrow_date',
        'due_date',
        'return_date',
        'status'
    ];
}