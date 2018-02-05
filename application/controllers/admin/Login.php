<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //try get error messages
        $errors = $this->session->userdata('error');

        $data = [
            'errors' => $errors
        ];

        $this->load->view('admin/default/head');
        $this->load->view('admin/login/content', $data);
        $this->load->view('admin/default/scripts');
    }

    public function loginPost()
    {
        $data = $this->input->post();
        if (empty($data['login']) || empty($data['password'])) {
            $this->session->set_flashdata('error', ['message' => 'Invalid login and/or password']);
            redirect('admin/login', 'refresh');
        }

        if (!$this->adminUser->loginAdmin($data)) {
            $this->session->set_flashdata('error', ['message' => 'Invalid login and/or password']);
            redirect('admin/login', 'refresh');
        }

        redirect('admin/', 'refresh');
    }
}
