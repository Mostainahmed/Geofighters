<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Phone extends CI_Controller {

	private $isloggedin = null;
	private $permissions = null;

	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->library('user_agent');
		$this->isloggedin = $this->session->userdata('logged_in');
        $this->load->model('Model_Region');
        $this->load->model('Model_User');
        $this->load->model('Model_Distributor');
        $this->load->model('Model_Phone');
	}

	private function accessdenied(){
		$data['title'] = 'Access Denied';
		$data['content']= $this->load->view('view_access_denied', $data, TRUE);
		$this->load->view('view_container', $data);
	}

	private function redirect_to_login() {
		$userdata = array( 'referer' => $_SERVER['HTTP_REFERER'] );
		$this->session->set_userdata($userdata);
		redirect(base_url().'authentication/login');
	}

	private function makeDateTimeId() {
		$t = microtime(true);
		$micro = sprintf("%06d",($t - floor($t)) * 1000000);
		$datetime = new DateTime( date('Y-m-d H:i:s.'.$micro, $t) );
		return $datetime->format("ymdHisu");
	}

	public function index() {
		if ($this->isloggedin) {
			$data['phone_list'] = $this->Model_Phone->get_phone_model_array();
			$data['rsm_list'] = $this->Model_User->get_rsm_array();
			$data['asm_list'] = $this->Model_User->get_asm_array();
			$data['region_array_for_rsm'] = $this->Model_Region->get_region_array_for_rsm();
			$data['region_array'] = $this->Model_Region->get_region_array();
			$data['content'] = $this->load->view('phone/view_manage_phone_model', $data, TRUE);
			$this->load->view('view_container', $data);
		} else {
			$this->redirect_to_login();
        }
        
    }

    public function add_new_phone_model(){
        $param = $this->input->post(NULL,TRUE);
        $var = $this->Model_Phone->add_new_phone_model($param);
		echo $var;
    }

    public function add_stock_model_wise(){
        $param = $this->input->post(NULL,TRUE);
        $var = $this->Model_Phone->add_stock_model_wise($param);
		echo $var;
    }

    public function manage_phone_stock(){
		$data['sub_region_array'] = $this->Model_Region->get_sub_region_array();
        $data['number_of_regions'] = $this->Model_Region->get_region_number();
        $data['number_of_sub_regions'] = $this->Model_Region->get_sub_region_number();
		$data['number_of_routes'] = $this->Model_Region->get_route_number();
		$data['number_of_distributors'] = $this->Model_Distributor->get_distributor_number();
        $data['region_array'] = $this->Model_Region->get_region_array();
        $data['phone_list'] = $this->Model_Phone->get_phone_model_array();
        $data['content'] = $this->load->view('phone/view_manage_phone_stock', $data, TRUE);
        $this->load->view('view_container', $data);
    }

    public function get_phone_stock_list_serverside(){
        $param = $this->input->post(NULL, TRUE);
		echo json_encode( $this->Model_Phone->get_phone_stock_list_serverside($param) );
	}
	
	public function get_phone_list_serverside(){
        $param = $this->input->post(NULL, TRUE);
		echo json_encode( $this->Model_Phone->get_phone_list_serverside($param) );
	}

	public function manage_distributor_phone_stock(){
		$data['sub_region_array'] = $this->Model_Region->get_sub_region_array();
        $data['number_of_regions'] = $this->Model_Region->get_region_number();
        $data['number_of_sub_regions'] = $this->Model_Region->get_sub_region_number();
		$data['number_of_routes'] = $this->Model_Region->get_route_number();
		$data['number_of_distributors'] = $this->Model_Distributor->get_distributor_number();
        $data['region_array'] = $this->Model_Region->get_region_array();
		$data['phone_list'] = $this->Model_Phone->get_phone_model_array();
        $data['content'] = $this->load->view('phone/view_distributor_phone_stock', $data, TRUE);
        $this->load->view('view_container', $data);
	}

	public function add_stock_to_distributor(){
		$param = $this->input->post(NULL,TRUE);
        $var = $this->Model_Phone->add_stock_to_distributor($param);
		var_dump($var);
	}
}