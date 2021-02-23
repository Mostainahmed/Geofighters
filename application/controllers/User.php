<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
			$data['rsm_list'] = $this->Model_User->get_rsm_array();
			$data['asm_list'] = $this->Model_User->get_asm_array();
			$data['tse_list'] = $this->Model_User->get_tse_array();
			$data['user_list'] = $this->Model_User->get_user_list();
			// var_dump($data['sub_region_array']);
			// die();
			// $data['number_of_regions'] = $this->Model_Region->get_region_number();
			// $data['number_of_sub_regions'] = $this->Model_Region->get_sub_region_number();
			// $data['number_of_routes'] = $this->Model_Region->get_route_number();
			$data['region_array_for_rsm'] = $this->Model_Region->get_region_array_for_rsm();
			$data['region_array'] = $this->Model_Region->get_region_array();
			$data['content'] = $this->load->view('user/view_assign_user', $data, TRUE);
			$this->load->view('view_container', $data);
		} else {
			$this->redirect_to_login();
        }
       
    }

    public function assign_rsm(){
        $param = $this->input->post(NULL, TRUE);
        $var = $this->Model_User->assign_rsm($param);
		echo $var;
    }

    public function assign_asm(){
        $param = $this->input->post(NULL, TRUE);
        $var = $this->Model_User->assign_rsm($param);
		echo $var;
    }

    public function assign_asm_to_rsm(){
        $param = $this->input->post(NULL, TRUE);
        $var = $this->Model_User->assign_asm_to_rsm($param);
		echo $var;
	}
	
	public function manage_users(){
		$data['rsm_list'] = $this->Model_User->get_rsm_array();
        $data['asm_list'] = $this->Model_User->get_asm_array();
		$data['region_array_for_rsm'] = $this->Model_Region->get_region_array_for_rsm();
		$data['region_array'] = $this->Model_Region->get_region_array();
        $data['content'] = $this->load->view('user/view_manage_users', $data, TRUE);
        $this->load->view('view_container', $data);
	}

	public function get_user_list_serverside(){
		$param = $this->input->post(NULL, TRUE);
		echo json_encode( $this->Model_User->get_user_list_serverside($param) );
	}

	public function update_user(){
		$param = $this->input->post(NULL,TRUE);
		$var = $this->Model_User->update_user($param);
		echo $var;
	}

	public function assign_base_station(){
		$param = $this->input->post(NULL, TRUE);
        $var = $this->Model_User->assign_base_station($param);
		echo $var;
	}
}