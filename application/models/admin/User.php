<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model
{
    private static $user;

    public function __construct()
    {
        parent::__construct();

        if ($sessionKey = $this->session->userdata('backend_key')) {
            $query = $this->db->get_where('admin_users', ['key' => $sessionKey]);

            if (!empty($query->result())) {
                $user = $query->result();
                self::$user = $user[0];
            }
        }

    }

    public function isLogined()
    {
        if (empty(self::$user)) {
            return false;
        } else {
            return true;
        }

    }

    public function getAdminData()
    {

    }

    public function loginAdmin($data)
    {
        $query = $this->db->get_where('admin_users', ['login' => $data['login'], 'password' => md5($data['password'])]);

        if (empty($query->result())) {
            return false;
        }

        $user = $query->result();
        self::$user = $user[0];

        //generate new admin key
        $backendKey = $this->generateKey();

        $data = array(
            'key' => $backendKey
        );

        //set key to DB
        $this->db->where('id', self::$user->id);
        $this->db->update('admin_users', $data);

        //set ket to SESSION
        $this->session->set_userdata(['backend_key' => $backendKey]);

        return true;
    }

    public function logoutAdmin()
    {

    }

    private function generateKey() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $backendKey = '';

        for ($i = 0; $i < 50; $i++) {
            $backendKey .= $characters[rand(0, $charactersLength - 1)];
        }

        return $backendKey;
    }
}
