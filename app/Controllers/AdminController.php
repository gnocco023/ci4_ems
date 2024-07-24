<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AccountModel;
use App\Models\ServiceProviderTypeModel;

class AdminController extends BaseController
{
    public function index()
    {
        $service_provider_model = new ServiceProviderTypeModel();
        $account_model = new AccountModel();

        $data['accounts'] = $account_model->where('service_provider_type_id != 3')->findAll();
        $data['service_provider_type'] = $service_provider_model->where('type !=', 'ADMIN')->findAll();

        return view('admin/index', $data);
    }
}
