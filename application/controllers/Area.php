<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends CI_Controller {

	private $isloggedin = null;
	private $permissions = null;

	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->library('user_agent');
		$this->isloggedin = $this->session->userdata('logged_in');
		// if ($this->isloggedin) {
		// 	$this->permissions = get_object_vars($this->session->userdata('permissions'));
		// } else {
		// 	$this->permissions = array();
		// }
		$this->load->model('Model_Region');
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
			$data['sub_region_array'] = $this->Model_Region->get_sub_region_array();
        	$data['number_of_regions'] = $this->Model_Region->get_region_number();
        	$data['number_of_sub_regions'] = $this->Model_Region->get_sub_region_number();
			$data['number_of_routes'] = $this->Model_Region->get_route_number();
			$data['number_of_distributors'] = $this->Model_Distributor->get_distributor_number();
        	$data['region_array'] = $this->Model_Region->get_region_array();
        	$data['content'] = $this->load->view('areas/view_areas', $data, TRUE);
        	$this->load->view('view_container', $data);
		} else {
			$this->redirect_to_login();
        }
    }

    public function add_regions(){
        $param = $this->input->post(NULL, TRUE);
        $var = $this->Model_Region->add_region($param);
		echo $var;
    }

    public function add_sub_regions(){
        $param = $this->input->post(NULL, TRUE);
        $var = $this->Model_Region->add_sub_region($param);
		echo $var;
    }

    public function get_sub_region_list_by_region_id(){
        $regionid = $this->input->post('region_id');
		echo json_encode($this->Model_Region->get_sub_regions_by_regionid($regionid));
		// die();
	}
	
	public function add_routes(){
		$param = $this->input->post(NULL, TRUE);
        $var = $this->Model_Region->add_routes($param);
		echo $var;
	}

	public function manage_regions(){
		$data['sub_region_array'] = $this->Model_Region->get_sub_region_array();
        $data['number_of_regions'] = $this->Model_Region->get_region_number();
        $data['number_of_sub_regions'] = $this->Model_Region->get_sub_region_number();
		$data['number_of_routes'] = $this->Model_Region->get_route_number();
		$data['number_of_distributors'] = $this->Model_Distributor->get_distributor_number();
        $data['region_array'] = $this->Model_Region->get_region_array();
        $data['content'] = $this->load->view('areas/view_manage_regions', $data, TRUE);
        $this->load->view('view_container', $data);
	}

	public function manage_sub_regions(){
		$data['sub_region_array'] = $this->Model_Region->get_sub_region_array();
        $data['number_of_regions'] = $this->Model_Region->get_region_number();
        $data['number_of_sub_regions'] = $this->Model_Region->get_sub_region_number();
		$data['number_of_routes'] = $this->Model_Region->get_route_number();
		$data['number_of_distributors'] = $this->Model_Distributor->get_distributor_number();
        $data['region_array'] = $this->Model_Region->get_region_array();
        $data['content'] = $this->load->view('areas/view_manage_sub_regions', $data, TRUE);
        $this->load->view('view_container', $data);
	}

	public function manage_routes(){
		$data['sub_region_array'] = $this->Model_Region->get_sub_region_array();
        $data['number_of_regions'] = $this->Model_Region->get_region_number();
        $data['number_of_sub_regions'] = $this->Model_Region->get_sub_region_number();
		$data['number_of_routes'] = $this->Model_Region->get_route_number();
		$data['number_of_distributors'] = $this->Model_Distributor->get_distributor_number();
        $data['region_array'] = $this->Model_Region->get_region_array();
        $data['content'] = $this->load->view('areas/view_manage_routes', $data, TRUE);
        $this->load->view('view_container', $data);
	}

	public function get_region_list_serverside(){
		$param = $this->input->post(NULL, TRUE);
		echo json_encode( $this->Model_Region->get_region_list_serverside($param) );
	}

	public function get_sub_region_list_serverside(){
		$param = $this->input->post(NULL, TRUE);
		echo json_encode( $this->Model_Region->get_sub_region_list_serverside($param) );
	}

	public function get_routes_list_serverside(){
		$param = $this->input->post(NULL, TRUE);
		echo json_encode( $this->Model_Region->get_routes_list_serverside($param) );
	}

	public function update_sub_region(){
		$param = $this->input->post(NULL,TRUE);
		$var = $this->Model_Region->update_sub_region($param);
		echo $var;
	}

	public function update_region(){
		$param = $this->input->post(NULL,TRUE);
		$var = $this->Model_Region->update_region($param);
		echo $var;
	}

	public function update_routes(){
		$param = $this->input->post(NULL,TRUE);
		$var = $this->Model_Region->update_routes($param);
		echo $var;
	}
}