<?php

namespace App\Models;

use CodeIgniter\Model;

class AccountModel extends Model
{
    protected $table            = 'tbl_account';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = [
        'lastname',
        'firstname',
        'middlename',
        'sex',
        'email',
        'username',
        'password',
        'service_provider_type_id'
    ];



    public function __construct()
    {
        parent::__construct();

        $db = \Config\Database::connect();
    }




    public function getAccounts()
    {
        $builder = $this->db->table('tbl_account');
        // $builder->select('tbl_account.id, tbl_account.lastname, tbl_account.firstname, tbl_account.middlename, tbl_account.sex, tbl_account.email, tbl_account.username, lib_spt.type');
        $builder->select([
            'tbl_account.id',
            'tbl_account.lastname',  'tbl_account.firstname', 'tbl_account.middlename',
            'tbl_account.sex',
            'tbl_account.email',
            'tbl_account.username',
            'lib_spt.type',
            'CASE WHEN tbl_ca.id IS NULL THEN 0 ELSE 1 END AS isActivated'
        ], false);
        $builder->join('lib_service_provider_type lib_spt', 'lib_spt.id = tbl_account.service_provider_type_id', 'inner');
        $builder->join('tbl_center_assignment tbl_ca', 'tbl_ca.account_id = tbl_account.id', 'left');
        $builder->where('lib_spt.type !=', 'ADMIN');
        $query = $builder->get();


        return $query->getResult();
    }

    public function getAccount($id)
    {
        $builder = $this->db->table('tbl_account');
        $builder->select([
            'tbl_account.id',
            'tbl_account.lastname',  'tbl_account.firstname', 'tbl_account.middlename',
            'tbl_account.sex',
            'tbl_account.email',
            'tbl_account.username',
            'lib_spt.type',
            'CASE WHEN tbl_ca.id IS NULL THEN 0 ELSE 1 END AS isActivated'
        ], false);
        $builder->join('lib_service_provider_type lib_spt', 'lib_spt.id = tbl_account.service_provider_type_id', 'inner');
        $builder->join('tbl_center_assignment tbl_ca', 'tbl_ca.account_id = tbl_account.id', 'left');
        $builder->where('tbl_account.id', esc($id));
        $query = $builder->get();


        return $query->getFirstRow();
    }

    public function getAccountForDelete($id)
    {
        $builder = $this->db->table('tbl_account');
        $builder->select([
            'tbl_account.id',
            'tbl_account.lastname',  'tbl_account.firstname', 'tbl_account.middlename',
            'tbl_account.sex',
            'tbl_account.email',
            'tbl_account.username',
            'lib_spt.type',
            'tbl_c.name center_name',
            'tbl_ca.id center_assignment_id',
            'tbl_ca.start_date',
            'tbl_ca.end_date',
        ], false);
        $builder->join('lib_service_provider_type lib_spt', 'lib_spt.id = tbl_account.service_provider_type_id', 'inner');
        $builder->join('tbl_center_assignment tbl_ca', 'tbl_ca.account_id = tbl_account.id', 'inner');
        $builder->join('tbl_center tbl_c', 'tbl_c.id = tbl_ca.center_id', 'inner');
        $builder->where('tbl_account.id', esc($id));
        $query = $builder->get();


        return $query->getFirstRow();
    }

    public function loginById($id)
    {
        $builder = $this->db->table('tbl_account');
        $builder->select([
            'tbl_account.id',
            'tbl_account.lastname',  'tbl_account.firstname', 'tbl_account.middlename',
            'tbl_account.sex',
            'tbl_account.email',
            'tbl_account.username',
            'lib_spt.type',
            'CASE WHEN tbl_ca.id IS NULL THEN 0 ELSE 1 END AS isActivated',
            'CASE WHEN lib_spt.id != 3 THEN 0 ELSE 1 END AS isAdmin'
        ], false);
        $builder->join('lib_service_provider_type lib_spt', 'lib_spt.id = tbl_account.service_provider_type_id', 'inner');
        $builder->join('tbl_center_assignment tbl_ca', 'tbl_ca.account_id = tbl_account.id', 'left');
        $builder->where('tbl_account.id', esc($id));
        $query = $builder->get();


        return $query->getFirstRow('array');
    }
}
