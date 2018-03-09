<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
    }
}

class Frontend_Controller extends MY_Controller
{
    protected $pageData;

    function __construct()
    {
        parent::__construct();

        $this->load->model('category');
        $categories = $this->category->getAllCategories();

        $this->pageData = [
            'navbarData' => ['categories' => $categories]
        ];
    }

}

class Admin_Controller extends MY_Controller
{
    private $notCheckAccess = ['login/index', 'login/loginPost'];

    protected $pageData;

    function __construct()
    {
        parent::__construct();

        $this->load->model('admin/user', 'adminUser');

        // check user aouth status!
        $controllerName = $this->router->fetch_class();
        $methodName = $this->router->fetch_method();
        $route = $controllerName . '/' . $methodName;

        if (!$this->adminUser->isLogined() && (!in_array($route, $this->notCheckAccess))) {
            redirect('admin/login', 'refresh');
        } else if($this->adminUser->isLogined() && (in_array($route, $this->notCheckAccess))) {
            redirect('admin/', 'refresh');
        }

        //prepare admin page data
        $this->adminData = $this->adminUser->getAdminData();

        $this->pageData = [
            'pageInformation'  => ['pageTitle' => 'Default'],
            'adminData'        => $this->adminData,
            'gridCollection'   => '',
            'itemData'         => '',
            'jsSettings'       => ['activeMenuItem' => 'default'],
            'messages'         => ['errors' => $this->session->userdata('error'), 'success' => $this->session->userdata('success')],
        ];
    }
}
