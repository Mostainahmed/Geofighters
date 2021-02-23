<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

    private $undermaintenance = 0;

    private $isloggedin = null;
    private $userinfo = null;

	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->library('user_agent');
		$this->load->model('Model_Authentication');
		$this->isloggedin = $this->session->userdata('logged_in');
        $this->userinfo['username'] = $this->session->userdata('username');
        $this->userinfo['name'] = $this->session->userdata('name');
        $this->userinfo['email'] = $this->session->userdata('email');
        // $this->userinfo['level'] = $this->session->userdata('userlevel');
	}

    public function redirect_to_login() {
        $userdata = array( 'referer' => $_SERVER['HTTP_REFERER'] );
        $this->session->set_userdata($userdata);
        redirect(base_url().'authentication/login');
    }

	public function index() {
        redirect(base_url().'authentication/registration');
        // $data['demo'] = 'mostain';
        // $data['content'] = $this->load->view('reglogin/view_registration',$data, TRUE);
        // $this->load->view('view_container', $data);
	}

    public function login() {
        if ($this->isloggedin) {
            redirect(base_url().'dashboard');
        } else {
            $this->load->view('view_login');
        }
    }

    public function registration(){
        // $this->Model_Authentication->validateUser($_POST['email'], $_POST['password']);
        $data['demo1'] = 'mostainahmed';
        $data['content'] = $this->load->view('reglogin/view_registration',$data, TRUE);
        $this->load->view('view_container', $data);
    }

    public function validateuser() {
        // echo $_POST['email'];
        // echo $_POST['password'];
        // die();
        $response = $this->Model_Authentication->validateUser($_POST['email'], $_POST['password']);
        //$response = "";
        //$userdata = $_POST['email'];
        //var_dump($userdata);
        //die();
        //$response = get_object_vars(json_decode($response));
        // var_dump($response);
        // die();
        //echo $response;
        if ($response =="success") {
            $userdata = $this->Model_Authentication->get_user_info($_POST['email']);
            //$user_permission = $this->Model_Authentication->get_user_permissions($userdata['username']);
            $userdata = array(
                'email'  => $userdata['email'],
                'username'  => $userdata['username'],
                'name'  => $userdata['name'],
                'logged_in' => TRUE,
                'ismobile' => $this->agent->is_mobile()
            );
            // var_dump($userdata);
            // die();
            $this->session->set_userdata($userdata);
            $response = array (
                'result' => 1,
                'referer' => $this->session->userdata('referer') ?: base_url()
            );
        } else {
            $response = array(
                'result' => 0
            );
        }
        echo json_encode($response);
    }

    public function logout() {
        if ($this->isloggedin) {
            $this->load->library('session');
            $this->session->sess_destroy();
            redirect(base_url());
        } else {
            $this->redirect_to_login();
        }
    }

    public function user_registration(){
        $param = $this->input->post(NULL,TRUE);
        echo json_encode($this->Model_Authentication->user_registration($param));
    }
}
