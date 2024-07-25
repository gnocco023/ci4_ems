<?php

namespace App\Models;

use CodeIgniter\Model;


class CenterTypeModel extends Model
{
    protected $table            = 'lib_center_type';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = [
        'type',
        'description'
    ];
}
