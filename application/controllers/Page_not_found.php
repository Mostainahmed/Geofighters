<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_not_found extends CI_Controller {

    public function index($value='') {
        $this->load->library('session');
        $this->load->model('Model_Dashboard');
        $data['title'] = 'Dashboard';
        $data['userdata'] = $this->session->userdata();
        $data['notifications'] = $this->Model_Dashboard->get_notifications();
        $data['content'] = $this->load->view('view_page_not_found', $data, TRUE);
        $this->load->view('view_container', $data);
    }
}
