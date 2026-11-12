<?php
 // this connects app to the members db table 
namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table = 'members';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'full_name',
        'email',
        'phone',
        'address',
        'status'
    ];
}