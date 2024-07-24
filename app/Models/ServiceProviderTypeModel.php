<?php

namespace App\Models;

use CodeIgniter\Model;

use App\Entities\ServiceProviderTypeEntity;

class ServiceProviderTypeModel extends Model
{
    protected $table            = 'lib_service_provider_type';
    protected $primaryKey       = 'id';
    protected $returnType       = ServiceProviderTypeEntity::class;
    protected $allowedFields    = ['type', 'description'];
}
