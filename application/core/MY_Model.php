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

    private static $object;

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

    public function load($id)
    {
        $query = $this->db->get_where($this->table, array('id' => $id));

        $result = false;
        foreach ($query->result() as $item)
        {
            $this->object = $item;
            break;
        }

        return $this->object;
    }

    public function save()
    {
        $data = [];

        foreach ($this->object as $key => $value) {
            $data[$key] = $value;
        }

        $this->db->where('id', $this->object->id);
        $this->db->update($this->table, $data);

        return true;
    }

    public function getData($field = null)
    {
        exit('get data method');
    }

    public function setData($data, $field = null)
    {
        if (!$field) {
            foreach ($data as $key => $value) {
                $this->object->{$key} = $value;
            }
        } else {
            $this->object->{$field} = $data;
        }
    }
}
