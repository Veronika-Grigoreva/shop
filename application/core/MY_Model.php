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

        $result = $query->result();

        return self::$object = $result[0];
    }

    public function save()
    {
        $data = [];

        foreach (self::$object as $key => $value) {
            $data[$key] = $value;
        }

        if (isset($data['id'])) {
            $this->db->where('id', self::$object->id);

            return $this->db->update($this->table, $data);
        } else {
            return $this->db->insert($this->table, $data);
        }
    }

    public function getData($field = null)
    {
        exit('get data method');
    }

    public function setData($data, $field = null)
    {
        if (!$field) {
            if (empty(self::$object)) {
                self::$object = new stdClass();
            }
            foreach ($data as $key => $value) {
                self::$object->$key = $value;
            }
        } else {
            self::$object->$field = $data;
        }
    }
}
