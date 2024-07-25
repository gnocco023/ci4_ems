<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AccountModel;
use App\Models\CenterModel;
use App\Models\CenterAssignmentModel;

class AdminController extends BaseController
{
    public function index()
    {
        $account_model = new AccountModel();

        $data['accounts'] = $account_model->getAccounts();


        return view('admin/index', $data);
    }


    public function activate($id)
    {
        helper('form');
        $session = session();
        $data = [];

        $account_model = new AccountModel();
        $center_model = new CenterModel();


        $data['account'] = $account_model->getAccount(esc($id));
        $data['centers'] = $center_model->findAll();

        if ($this->request->is('POST')) {
            $center_assignment_model = new CenterAssignmentModel();

            $post = $this->request->getPost(['selected_center', 'start_date']);

            $remmapedData = [
                'center_id' => esc($post['selected_center']),
                'account_id' => esc($id),
                'start_date' => esc($post['start_date']),
                'account_activated' => 1
            ];

            $center_assignment_model->save($remmapedData);

            $session->setFlashdata('success_message', 'Successfully activated account of ' . $data['account']->lastname . ',' . $data['account']->firstname . ' ' . $data['account']->middlename);

            return redirect()->to('admin');
        }



        return view('admin/activate', $data);
    }


    public function delete($id)
    {
        helper('form');
        $session = session();
        $data = [];

        $account_model = new AccountModel();


        $data['account'] = $account_model->getAccountForDelete(esc($id));

        if ($this->request->is('POST')) {
            $center_assignment_model = new CenterAssignmentModel();

            $account_id = $data['account']->id;
            $center_assignment_id = $data['account']->center_assignment_id;


            $center_assignment_model->delete($center_assignment_id);
            $account_model->delete($account_id);

            $session->setFlashdata('success_message', 'Successfully deleted account and center assignment of ' . $data['account']->lastname . ',' . $data['account']->firstname . ' ' . $data['account']->middlename);

            return redirect()->to('admin');
        }


        return view('admin/delete', $data);
    }
}
