<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    private $undermaintenance = 0;

    private $isloggedin = null;
    private $userinfo = null;

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('user_agent');
        $this->load->model('Model_Region');
        $this->load->model('Model_Authentication');
        $this->load->model('Model_Dashboard');
        $this->load->model('Model_Phone');
        $this->load->model('Model_Travel');
        $this->load->model('Model_User');
        $this->load->model('Model_Distributor');
        $this->isloggedin = $this->session->userdata('logged_in');
    }

    public function redirect_to_login() {
        $userdata = array( 'referer' => $_SERVER['HTTP_REFERER'] );
        $this->session->set_userdata($userdata);
        redirect(base_url().'authentication/login');
    }

    public function index() {
        if ($this->isloggedin) {
            $data["user_count"] = $this->Model_Dashboard->getUserCount();
            $data['total_cost_behind_employees'] = $this->Model_Dashboard->getCostOfUsers();
            $data['total_tour_completed'] = $this->Model_Dashboard->getTotalCompletedTour();
            $data['content'] = $this->load->view('view_dashboard', $data, TRUE);
            $this->load->view('view_container', $data);
        } else {
            $this->redirect_to_login();
        }
    }

    // public function get_notifications() {
    //     if ($this->isloggedin) {
    //         $username =  $this->session->userdata('username');
    //         echo json_encode( $this->Model_Dashboard->get_notifications( $username ) );
    //     } else {
    //         echo "403";;
    //     }
    // }

}
