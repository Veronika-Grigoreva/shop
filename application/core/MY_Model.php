<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->load->database();
    }
}

class CMS_Model extends MY_Model
{
    private $table = '';

    function __construct($table)
    {
        $this->table = $table;

        parent::__construct();
    }

    protected function prepareData($data)
    {
        return $data;
    }

    public function getCollection()
    {
        $query = $this->db->get($this->table);

        return $this->prepareData($query->result());
    }

    public function load()
    {
        exit('load method');
    }

    public function getData()
    {
        exit('get data method');
    }

    public function setData()
    {
        exit('set data method');
    }
}
