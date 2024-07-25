<?php

namespace App\Models;

use CodeIgniter\Model;


class CenterModel extends Model
{
    protected $table            = 'tbl_center';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = [
        'name',
        'description',
        'center_type_id',
    ];
}
