<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AccountModel;

class AccountController extends BaseController
{
    public function login()
    {
        return view('account/login');
    }

    public function register()
    {
        helper('form');
        $session = session();
        $data = [];



        if ($this->request->is('POST')) {

            $post = $this->request->getPost([
                'lastname',
                'firstname',
                'middlename',
                'sex',
                'email',
                'username',
                'password',
                'confirm_password',
                'service_provider_type'
            ]);


            $rules = [
                'lastname' => ['label' => 'Last Name', 'rules' => 'required|max_length[30]|min_length[2]'],
                'firstname' => ['label' => 'First Name', 'rules' => 'required|max_length[30]|min_length[2]'],
                'middlename' => ['label' => 'Middle Name', 'rules' => 'max_length[30]'],
                'sex' => ['label' => 'Sex', 'rules' => 'required|max_length[1]'],
                'email' => ['label' => 'Email', 'rules' => 'required|max_length[255]|valid_email'],
                'username' => ['label' => 'Username', 'rules' => 'required|max_length[50]'],
                'password' =>  ['label' => 'Password', 'rules' => 'required|max_length[50]|min_length[8]'],
                'confirm_password' =>  ['label' => 'Confirm Password', 'rules' => 'required|max_length[50]|matches[password]'],
                'service_provider_type' => ['label' => 'Service Provider Type', 'rules' => 'required|max_length[1]'],
            ];

            if (!$this->validateData($post, $rules)) {
                $data['show_div'] = true;
            } else {

                $remappedData = [
                    'lastname' => $post['lastname'],
                    'firstname' => $post['firstname'],
                    'middlename' => $post['middlename'],
                    'sex' => $post['sex'],
                    'email' => $post['email'],
                    'username' => $post['username'],
                    'password' => sha1($post['password']),
                    'service_provider_type_id' => $post['service_provider_type']
                ];

                $account_model = new AccountModel();
                $account_model->save($remappedData);

                $session->setFlashdata('success_message', 'Successfully registered an account. Please wait for the confirmation of your account. Thank you!');

                return view('account/login', $data);
            }
        }

        return view('account/register', $data);
    }

    public function test()
    {
        $account_model = new AccountModel();
        $data['accounts'] = $account_model->findAll();

        dd($data);

        return $data;
    }
}
