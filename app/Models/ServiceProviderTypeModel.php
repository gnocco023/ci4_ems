<?php

namespace App\Models;

use CodeIgniter\Model;

class ServiceProviderTypeModel extends Model
{
    protected $table            = 'lib_service_provider_type';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = ['type', 'description'];
}
