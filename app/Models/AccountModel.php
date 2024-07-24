<?php

namespace App\Models;

use CodeIgniter\Model;

use App\Entities\AccountEntity;

class AccountModel extends Model
{
    protected $table            = 'tbl_account';
    protected $primaryKey       = 'id';
    protected $returnType       = AccountEntity::class;
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
