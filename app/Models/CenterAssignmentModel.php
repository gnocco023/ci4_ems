<?php

namespace App\Models;

use CodeIgniter\Model;

class CenterAssignmentModel extends Model
{
    protected $table            = 'tbl_center_assignment';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = [
        'center_id',
        'account_id',
        'start_date',
        'end_date',
        'account_activated'
    ];
}
