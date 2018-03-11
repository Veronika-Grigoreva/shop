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

    protected $object;

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
        $this->object = $this->prepareData($query->result());

        return $this;
    }

    public function load($id)
    {
        $query = $this->db->get_where($this->table, array('id' => $id));

        $result = $query->result();
        $this->object = $result[0];

        return $this;
    }

    public function save()
    {
        $data = [];

        foreach ($this->object as $key => $value) {
            $data[$key] = $value;
        }

        if (isset($data['id'])) {
            $this->db->where('id', $this->object->id);

            return $this->db->update($this->table, $data);
        } else {
            return $this->db->insert($this->table, $data);
        }
    }

    public function delete()
    {
        $this->db->where('id', $this->object->id);

        return $this->db->delete($this->table);
    }

    public function getData()
    {
        return $this->object;
    }

    public function setData($data, $field = null)
    {
        if (!$field) {
            if (empty($this->object)) {
                $this->object = new stdClass();
            }

            foreach ($data as $key => $value) {
                $this->object->$key = $value;
            }
        } else {
            $this->object->$field = $data;
        }
    }
}
