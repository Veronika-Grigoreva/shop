<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CMS_Model
{
    private $table = 'product';

    public function __construct()
    {
        parent::__construct($this->table);
    }

    protected function prepareData($data)
    {
        foreach ($data as $itemKey => $item) {
            foreach ($item as $key => $value) {
                switch ($key) {
                    case 'image':
                        $data[$itemKey]->image = '/img/cms/products/' . $data[$itemKey]->image;

                        if (!file_exists(FCPATH . $data[$itemKey]->image) || !is_file(FCPATH . $data[$itemKey]->image)) {
                            $data[$itemKey]->image = '/img/cms/products/default.jpg';
                        }
                        break;
                    case 'sale':
                        $data[$itemKey]->sale = (int)$data[$itemKey]->sale;
                        $data[$itemKey]->newprice = $data[$itemKey]->price - $data[$itemKey]->price * ((int)$data[$itemKey]->sale / 100);
                        break;
                }
            }
        }

        return $data;
    }
}
