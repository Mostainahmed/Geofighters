<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Authentication extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->config->item('base_url');
        $this->config->item('api_url');
        $this->load->helper('url');
        $this->load->database();
    }

    function validateUser($email,$password) {
        // $this->load->library('Curl');
        // $url = "https://hydrokleen.com.bd/admin/api2/hk_login.php";
        // $post_data = array (
        //     "username" => $username,
        //     "password" => $password,
        //     "fromsrc" => "web",
        //     "useragent" => $_SERVER["HTTP_USER_AGENT"],
        //     "httphost"=> $_SERVER["HTTP_HOST"],
        //     "remoteaddr"=> $_SERVER["REMOTE_ADDR"],
        //     "remoteport"=> $_SERVER["REMOTE_PORT"]
        // );
        // $data = $this->curl->simple_post($url, $post_data);
        $success = 'success';
        $error = 'error';
        $data = $this->db
                    ->select('*')
                    ->where('password', $password)
                    ->where('email', $email)
                    ->get('tbl_users')
                    ->row_array();
        
        $user_role = $data['designation'];
        $user_level = $data['level'];
        if($user_role == "ADMIN" && $user_level == "1"){
            return $success;
        }else{
            return $error;
        }
    }

    public function get_user_info($email) {
        return $this->db
                ->select("email, username, fullname AS name, level, 'TRUE' AS logged_in")
                ->get_where('tbl_users', array('email' => $email))
                ->row_array();
    }

    // public function get_user_permissions($username='') {
    //     return $this->db->get_where('tbl_UserPermission', array('username' => $username))->row();
    // }

    function user_registration($post){
        $random_value = mt_rand(100000,999999);
        $post['createdby'] = $this->session->userdata('username');
        $post['user_id'] = "GEO-".$random_value;
        $user_id = $this->db
                                ->select('user_id')
                                ->where('user_id', $post['user_id'])
                                ->get('tbl_users')
                                ->row_array();
        if($user_id>0){
            $random_value = mt_rand(100000,999999);
            $post['user_id'] = "GEO-".$random_value;
        }
        if($post['designation'] == "RSM"){
            $rsm['user_id'] = $post['user_id'];
            $rsm['user_name'] = $post['username'];
            $rsm['full_name'] = $post['fullname'];
            $rsm['phone_no'] = $post['phone_no'];
            $rsm_result = $this->db->insert('tbl_rsm', $rsm);
        }else if($post['designation'] == "ASM"){
            $asm['user_id'] = $post['user_id'];
            $asm['user_name'] = $post['username'];
            $asm['full_name'] = $post['fullname'];
            $asm['phone_no'] = $post['phone_no'];
            $asm_result = $this->db->insert('tbl_asm', $asm);
        }else if($post['designation'] == "TSE"){
            $tse['user_id'] = $post['user_id'];
            $tse['user_name'] = $post['username'];
            $tse['full_name'] = $post['fullname'];
            $tse['phone_no'] = $post['phone_no'];
            $tse_result = $this->db->insert('tbl_tse', $tse);
        }else if($post['designation'] == "ADMIN"){
            $post['level'] = "1";
            $admin_result = TRUE;
        }
        if($rsm_result || $asm_result || $tse_result || $admin_result){
            $result = $this->db->insert('tbl_users', $post);
        return $result;
        }
    }

    function authenticate_mobile_user($phone, $password){
        $user_data = $this->db
                    ->select('*, "********" AS password')
                    ->where('phone_no', $phone)
                    ->where('password', $password)
                    ->get('tbl_users')
                    ->row_array();
        if($user_data>0){
            $user_data['region_details'] = $this->db
                    ->select('region_id, region_name')
                    ->where('rsm_id', $user_data['user_id'])
                    ->or_where('asm_id', $user_data['user_id'])
                    ->get('tbl_sub_regions')
                    ->row_array();
            // if($user_data[]){

            // }
            return $user_data;
        }else{
            $result = "failed";
            return $result;
        }

    }
}
?>