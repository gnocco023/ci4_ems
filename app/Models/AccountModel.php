<?php

namespace App\Models;

use CodeIgniter\Model;

class AccountModel extends Model
{
    protected $table            = 'tbl_account';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = [
        'lastname',
        'firstname',
        'middlename',
        'sex',
        'email',
        'username',
        'password',
        'service_provider_type_id'
    ];
}
