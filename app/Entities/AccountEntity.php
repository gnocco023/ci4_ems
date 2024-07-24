<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

use function PHPUnit\Framework\returnSelf;

class AccountEntity extends Entity
{

    public function ConvertServiceProviderType($data)
    {
        foreach ($data as $spt) {
            if ($this->service_provider_type_id == $spt->id)
                return $spt->type;
        }

        return "";
    }
}
