<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Travel extends CI_Controller {

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
        $this->load->model('Model_Travel');
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
			$data['user_list'] = $this->Model_User->get_user_list();
			// var_dump($data['sub_region_array']);
			// die();
			// $data['number_of_regions'] = $this->Model_Region->get_region_number();
			// $data['number_of_sub_regions'] = $this->Model_Region->get_sub_region_number();
			// $data['number_of_routes'] = $this->Model_Region->get_route_number();
			$data['region_array_for_rsm'] = $this->Model_Region->get_region_array_for_rsm();
			$data['region_array'] = $this->Model_Region->get_region_array();
			$data['content'] = $this->load->view('travel/view_travel_plan', $data, TRUE);
			$this->load->view('view_container', $data);
		} else {
			$this->redirect_to_login();
        }
	}
	
	public function budget_claim(){
		if ($this->isloggedin) {
			$data['rsm_list'] = $this->Model_User->get_rsm_array();
			$data['asm_list'] = $this->Model_User->get_asm_array();
			$data['user_list'] = $this->Model_User->get_user_list();
			$data['region_array_for_rsm'] = $this->Model_Region->get_region_array_for_rsm();
			$data['region_array'] = $this->Model_Region->get_region_array();
			$data['content'] = $this->load->view('travel/view_budget_claim_report', $data, TRUE);
			$this->load->view('view_container', $data);
		} else {
			$this->redirect_to_login();
        }
	}

    public function get_travel_plan_list_serverside(){
        $param = $this->input->post(NULL, TRUE);
		echo json_encode( $this->Model_Travel->get_travel_plan_list_serverside($param) );
	}
	
	public function accept_travel_plan(){
		$param = $this->input->post('travel_plan_id');
		$var = $this->Model_Travel->accept_travel_plan($param);
		echo $var;
	}

	public function get_budget_claim_list_serverside(){
		$param = $this->input->post(NULL, TRUE);
		echo json_encode( $this->Model_Travel->get_budget_claim_list_serverside($param) );
	}

	public function approve_budget_claim(){
		$param = $this->input->post(NULL, TRUE);
		$var = $this->Model_Travel->approve_budget_claim($param);
		echo $var;
	}

	public function decline_budget_claim(){
		$param = $this->input->post(NULL, TRUE);
		$var = $this->Model_Travel->decline_budget_claim($param);
		echo $var;
	}

	public function accepted_travel_plan(){
		if ($this->isloggedin) {
			$data['demo_accepted_travel_plan'] = "accepted_travel_plan";
			$data['content'] = $this->load->view('travel/view_accepted_travel_plan', $data, TRUE);
			$this->load->view('view_container', $data);
		} else {
			$this->redirect_to_login();
        }
	}

	public function incomplete_travel_plan(){
		if ($this->isloggedin) {
			$data['demo_incomplete_travel_plan'] = "incomplete_travel_plan";
			$data['content'] = $this->load->view('travel/view_incomplete_travel_plan', $data, TRUE);
			$this->load->view('view_container', $data);
		} else {
			$this->redirect_to_login();
        }
	}

	public function accepted_budget_claim(){
		if ($this->isloggedin) {
			$data['demo_accepted_budget_claim'] = "accepted_budget_claim";
			$data['content'] = $this->load->view('travel/view_accepted_budget_claim', $data, TRUE);
			$this->load->view('view_container', $data);
		} else {
			$this->redirect_to_login();
        }
	}

	public function declined_budget_claim(){
		if ($this->isloggedin) {
			$data['demo_declined_budget_claim'] = "declined_budget_claim";
			$data['content'] = $this->load->view('travel/view_declined_budget_claim', $data, TRUE);
			$this->load->view('view_container', $data);
		} else {
			$this->redirect_to_login();
        }
	}

	public function get_declined_budget_claim_list_serverside(){
		$param = $this->input->post(NULL, TRUE);
		echo json_encode( $this->Model_Travel->get_declined_budget_claim_list_serverside($param) );
	}

	public function get_approved_budget_claim_list_serverside(){
		$param = $this->input->post(NULL, TRUE);
		echo json_encode( $this->Model_Travel->get_approved_budget_claim_list_serverside($param) );
	}

	public function get_accepted_travel_plan_list_serverside(){
        $param = $this->input->post(NULL, TRUE);
		echo json_encode( $this->Model_Travel->get_accepted_travel_plan_list_serverside($param) );
	}

	public function get_incomplete_travel_plan_list_serverside(){
		$param = $this->input->post(NULL, TRUE);
		echo json_encode( $this->Model_Travel->get_incomplete_travel_plan_list_serverside($param) );
	}

	public function end_travel_plan(){
		$param = $this->input->post(NULL, TRUE);
		$var = $this->Model_Travel->end_travel_plan($param);
		echo $var;
	}
}