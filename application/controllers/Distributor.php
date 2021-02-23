<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distributor extends CI_Controller {

	private $isloggedin = null;
	private $permissions = null;

	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->library('user_agent');
		$this->isloggedin = $this->session->userdata('logged_in');
        $this->load->model('Model_Distributor');
        $this->load->model('Model_Region');
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
			$data['region_array'] = $this->Model_Region->get_region_array();
			$data['content'] = $this->load->view('distributor/view_distributor', $data, TRUE);
			$this->load->view('view_container', $data);
		} else {
			$this->redirect_to_login();
        }
        // $data['sub_region_array'] = $this->Model_Region->get_sub_region_array();
        // $data['number_of_regions'] = $this->Model_Region->get_region_number();
        // $data['number_of_sub_regions'] = $this->Model_Region->get_sub_region_number();
        // $data['number_of_routes'] = $this->Model_Region->get_route_number();
        // $data['region_array'] = $this->Model_Region->get_region_array();
        //$data["dummy_distributor_data"] = "Heyy Dummy";
    }

    public function get_distributor_list_serverside(){
        $param = $this->input->post(NULL, TRUE);
		echo json_encode( $this->Model_Distributor->get_distributor_list_serverside($param) );
    }

    public function get_routes_list_by_sub_region_id(){
        $subregionid = $this->input->post('sub_region_id');
		echo json_encode($this->Model_Region->get_routes_list_by_sub_region_id($subregionid));
    }

    public function add_distributor(){
        $param = $this->input->post(NULL, TRUE);
        $var = $this->Model_Distributor->add_distributor($param);
		echo $var;
    }

    public function delete_distributor(){
        $param = $this->input->post('distributor_id');
		$var = $this->Model_Distributor->delete_distributor($param);
		echo $var;
	}
	
	public function update_distributor(){
		$param = $this->input->post(NULL,TRUE);
		$var = $this->Model_Distributor->update_distributor($param);
		echo $var;
	}

	public function get_distributor_list_by_assigned_area_id(){
		$assigned_area_id = $this->input->post('assigned_area_id');
		echo json_encode($this->Model_Distributor->get_distributor_list_by_assigned_area_id($assigned_area_id));
	}
}