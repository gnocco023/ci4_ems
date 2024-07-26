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


    public function updateAccountDetails($id)
    {
        helper('form');
        $session = session();
        $data = [];

        $account_model = new AccountModel();


        $data['account'] = $account_model->find(esc($id));

        if ($this->request->is('POST')) {

            $post = $this->request->getPost([
                'id',
                'lastname',
                'firstname',
                'middlename',
                'sex',
                'email',
                'username',
                'service_provider_type'
            ]);

            if ($post['id'] != $data['account']->id) {
                // throws error
            }


            $rules = [
                'lastname' => ['label' => 'Last Name', 'rules' => 'required|max_length[30]|min_length[2]'],
                'firstname' => ['label' => 'First Name', 'rules' => 'required|max_length[30]|min_length[2]'],
                'middlename' => ['label' => 'Middle Name', 'rules' => 'max_length[30]'],
                'sex' => ['label' => 'Sex', 'rules' => 'required|max_length[1]'],
                'email' => ['label' => 'Email', 'rules' => 'required|max_length[255]|valid_email'],
                'username' => ['label' => 'Username', 'rules' => 'required|max_length[50]'],
                'service_provider_type' => ['label' => 'Service Provider Type', 'rules' => 'required|max_length[1]'],
            ];

            if (!$this->validateData($post, $rules)) {
                $data['show_div'] = true;
            } else {

                $remappedData = [
                    'id' => $data['account']->id,
                    'lastname' => $post['lastname'],
                    'firstname' => $post['firstname'],
                    'middlename' => $post['middlename'],
                    'sex' => $post['sex'],
                    'email' => $post['email'],
                    'username' => $post['username'],
                    'password' => $data['account']->password,
                    'service_provider_type_id' => $post['service_provider_type']
                ];

                $account_model->update(esc($id), $remappedData);

                $session->setFlashdata('success_message', 'Successfully updated an account of ' . $data['account']->lastname . ',' . $data['account']->firstname . ' ' . $data['account']->middlename);

                return redirect()->to('admin');
            }
        }


        return view('admin/update_account', $data);
    }
}
